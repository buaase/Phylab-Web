# -*- coding:utf-8 -*-
# 激光双棱镜干涉&激光劳埃镜干涉
import xml.dom.minidom
import math
import os
import json
import sys
import subprocess
from jinja2 import Template
from jinja2 import Environment

global X_10811
global X_10812
global DELTA_X
global UA_10DELTA_X
global UB_10DELTA_X
global U_10DELTA_X
global U_DELTA_X
global LIGHT_SMALL_BIG
global DATA_BIG
global DATA_SMALL
global source_10711
global B_BIG
global B_SMALL
global U_B1
global U_B2
global S_SMALL
global S_BIG
global LAMDA_LAB
global RE_LAMDA
global RESULT_LAMDA,RESULT_U_LAMDA,RESULT_POWER,U_LAMDA

DATA_SMALL=[]
DATA_BIG=[]
DELTA_X=[]
X_10811=[]


env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

def ToScience(number):
    Tempstr = format(number,'.4g')
    #如果发现Tempstr中含有e的话，说明是科学计数法
    if 'e' in  Tempstr:
        index_str = Tempstr.split('e')
        return index_str[0]+'{\\times}10^{'+str(int(index_str[1]))+'}'
    else:
        return Tempstr
#激光双棱镜干涉
#计算δx

#最终结果的对齐
def BitAdapt(x,u_x) :
    ten = 0
    if (u_x >= 10):
        temp = x
        while(temp >= 10):
            temp = temp/10
            ten += 1
        x = float(x)/10**ten
        u_x = float(u_x)/10**ten
    Tempbit = 0;
    bit = 0;
    while (1):
        i = 0
        while(1):
            temp = float(u_x)*(10**i)
            if(temp >= 1):
                bit = i
                break;
            else :
                i+=1
        u_x = round(float(u_x),bit)
        x = round(float(x),bit)
        if bit == 0:
            u_x = ("%d" % u_x)
            x = ("%d" % x)
        elif bit == 1:
            u_x = ("%.1f" % u_x)
            x = ("%.1f" % x)
        elif bit == 2:
            u_x = ("%.2f" % u_x)
            x = ("%.2f" % x)
        elif bit == 3:
            u_x = ("%.3f" % u_x)
            x = ("%.3f" % x)
        elif bit == 4:
            u_x = ("%.4f" % u_x)
            x = ("%.4f" % x)
        elif bit == 5:
            u_x = ("%.5f" % u_x)
            x = ("%.5f" % x)
        elif bit == 6:
            u_x = ("%.6f" % u_x)
            x = ("%.6f" % x)
        elif bit == 7:
            u_x = ("%.7f" % u_x)
            x = ("%.7f" % x)
        elif bit == 8:
            u_x = ("%.8f" % u_x)
            x = ("%.8f" % x)
        i = 0
        while(1):
            temp = float(u_x)*(10**i)
            if(temp >= 1):
                Tempbit = i
                break;
            else :
                i+=1
        if Tempbit == bit:
            break;
    res = []    
    res.append(x)
    res.append(u_x)
    res.append(ten)
    return res


def readXml10811(item):
    global X_10811,LIGHT_SMALL_BIG,DATA_BIG,DATA_SMALL
    
    tablelist = item.getElementsByTagName('table')

    table_1 = tablelist[0]
    datalist = table_1.getElementsByTagName('td')
    #获取光源及小像大像位置
    data_x = (float(datalist[2].firstChild.nodeValue),float(datalist[3].firstChild.nodeValue), float(datalist[4].firstChild.nodeValue))
    LIGHT_SMALL_BIG  = (float(datalist[2].firstChild.nodeValue),float(datalist[3].firstChild.nodeValue),float(datalist[4].firstChild.nodeValue))

    table_2 = tablelist[1]
    datalist = table_2.getElementsByTagName('td')
    #获取大像位置
    data_b2 = (float(datalist[0].firstChild.nodeValue), float(datalist[1].firstChild.nodeValue),float(datalist[2].firstChild.nodeValue), float(datalist[3].firstChild.nodeValue))
    for b in data_b2:
        DATA_BIG.append(b)

    #获取小像位置
    data_b1 = (float(datalist[4].firstChild.nodeValue),float(datalist[5].firstChild.nodeValue),float(datalist[6].firstChild.nodeValue),float(datalist[7].firstChild.nodeValue))
    for b in data_b1:
        DATA_SMALL.append(b)

    table_3 = tablelist[2]
    datalist = table_3.getElementsByTagName('td')
    #获取条纹位置
    data_X = []
    for i in range(len(datalist)):
        data_X.append(float(datalist[i].firstChild.nodeValue))
        X_10811.append(float(datalist[i].firstChild.nodeValue))
    return data_b1, data_b2, data_x, data_X

#1081
#激光双棱镜
def cal_delta_X10811(X):
    #X为条纹位置数组
    #计算δx 
    global DELTA_X,UA_10DELTA_X,UB_10DELTA_X,U_10DELTA_X,U_DELTA_X
    sum=0
    for x in range(len(X)/2):
        sum+=abs(X[x+len(X)/2]-X[x])
    delta_x=sum/(len(X)/2)**2
    print sum
    print delta_x
    #大写常量作为格式化后要打印在tex文件里的数
    DELTA_X = ToScience(delta_x)
    #计算不确定度
    sum=0
    for x in range(len(X)/2):
        sum+=(abs(X[x+len(X)/2]-X[x])-10*delta_x)**2
    print sum
    ua_10delta_x=math.sqrt(sum/90)
    ub_10delta_x=0.01/(2*math.sqrt(3))

    UA_10DELTA_X = ToScience(ua_10delta_x)

    UB_10DELTA_X = ToScience(ub_10delta_x)
    
    u_10delta_x = math.sqrt(ua_10delta_x**2+ub_10delta_x**2)
    U_10DELTA_X = ToScience(u_10delta_x)
    
    u_delta_x=u_10delta_x/10
    U_DELTA_X = ToScience(u_delta_x)



    #delta_x为条纹间距
    #u_delta_x为δx的不确定度
    return delta_x,u_delta_x

#计算波长lab
def cal_lab10811(b1,b2,x,delta_x,u_delta_x):
    global B_SMALL,B_BIG,S_SMALL,S_BIG, RE_LAMDA,U_B1,U_B2,LAMDA_LAB,RE_LAMDA, RESULT_LAMDA,RESULT_U_LAMDA,RESULT_POWER,U_LAMDA 
    #b1,b2各为长度为4的数组，记录正(两次)反(两次)共4次b值
    #x中存放光源，成小像，成大像x位置
    #delta_x为δx值
    #u_delta_x为δx的不确定度
    #计算lab
    avg_b1=(b1[0]-b1[1]+b1[2]-b1[3])/2
    avg_b2=(b2[0]-b2[1]+b2[2]-b2[3])/2
    B_SMALL = ToScience(avg_b1)
    B_BIG = ToScience(avg_b2)

    s1=x[0]-x[1]
    S_SMALL = ToScience(s1)

    s2=x[0]-x[2]
    S_BIG = ToScience(s2)

    lab=1000000*delta_x*math.sqrt(avg_b1*avg_b2)/(s1+s2)/10
    LAMDA_LAB = ToScience(lab)

    #计算不确定度
    u_b1=0.025*avg_b1/math.sqrt(3)
    U_B1 = ToScience(u_b1)

    u_b2=0.025*avg_b2/math.sqrt(3)
    U_B2 = ToScience(u_b2)

    u_s1=0.5/math.sqrt(3)
    u_s1s2=math.sqrt(2)*u_s1
    u_lab=math.sqrt((u_delta_x/delta_x)**2+1/4*(u_b1/avg_b1)**2+1/4*(u_b2/avg_b2)**2+(u_s1s2/(s1+s2))**2)
    RE_LAMDA = ToScience(u_lab)

    u_lamda = lab * u_lab
    U_LAMDA = ToScience(u_lamda)

    Result = BitAdapt(lab,u_lamda)
    RESULT_LAMDA = Result[0]
    RESULT_U_LAMDA = Result[1]
    RESULT_POWER = Result[2]
    
    result = env.from_string(source_10711).render(
        X_10811 = X_10811,
        DATA_BIG = DATA_BIG,
        DATA_SMALL = DATA_SMALL,
        DELTA_X = DELTA_X,
        UA_10DELTA_X = UA_10DELTA_X,
        UB_10DELTA_X = UB_10DELTA_X,
        U_10DELTA_X = U_10DELTA_X,
        U_DELTA_X = U_DELTA_X,
        LIGHT_SMALL_BIG = LIGHT_SMALL_BIG,
        B_SMALL = B_SMALL,
        B_BIG = B_BIG,
        S_SMALL = S_SMALL,
        S_BIG = S_BIG,
        LAMDA_LAB = LAMDA_LAB,
        U_B1 = U_B1,
        U_B2 = U_B2,
        RE_LAMDA = RE_LAMDA,
        RESULT_LAMDA = RESULT_LAMDA,
        RESULT_U_LAMDA = RESULT_U_LAMDA,
        RESULT_POWER = RESULT_POWER,
        U_LAMDA = U_LAMDA
        )
    #lab为波长
    #u_lab为lab的不确定度
    return result

def ReadXmlTop():
    #´ò¿ªÍ³Ò»µÄÍ·ÎÄ¼þÄ£°æ
    global source_10711
    latex_head_file = open('Head.tex','r')
    latex_head = latex_head_file.read().decode('utf-8', 'ignore')
    latex_tail = "\n\\end{document}"
    latex_body = ""

    #sys.argv[1]里放的是1081.xml
    #dom = xml.dom.minidom.parse(sys.argv[1])
    dom = xml.dom.minidom.parse('1081.xml')
    root = dom.documentElement
    root_id = root.getAttribute("id")
    itemlist = root.getElementsByTagName('sublab')
    item = itemlist[0]
    sublab_status = item.getAttribute("status")
    sublab_id = item.getAttribute("id")
    if sublab_status == "true" and sublab_id == "10811":
        file_object = open("Handle10811.tex","r")
        source_10711 = file_object.read().decode('utf-8', 'ignore')
        datalist1 = readXml10811(item)
        datalist2 = cal_delta_X10811(datalist1[3])
        #result存放结果
        result = cal_lab10811(datalist1[0], datalist1[1], datalist1[2], datalist2[0], datalist2[1])
        return result
    
if __name__ == '__main__':
    '''try:'''
    finish_str = ReadXmlTop()
    finish_file = open("finished"+".tex","w")
    finish_file.write(finish_str.encode('utf-8', 'ignore'))
    finish_file.close()
    #等于１时是错误
    '''ret =  subprocess.call("pdflatex -interaction=nonstopmode "+sys.argv[2]+".tex",shell=True)
        subprocess.call("rm "+sys.argv[2]+".aux",shell=True)        
        subprocess.call("rm "+sys.argv[2]+".synctex*",shell=True)
        subprocess.call("rm "+sys.argv[2]+".log",shell=True)
        if ret==0:
            print('{"status":"success"}')
        else:
            print('{"status":"fail"}')
    except Exception as e:
        print(traceback.format_exc())'''
