# -*- coding: utf-8 -*-
import xml.dom.minidom
from math import sqrt
from numpy import sin
from numpy import cos
from numpy import pi
from jinja2 import Template
from jinja2 import Environment

#全局变量，方便记录原始数据
#Vert为三棱镜顶角测量数组
angle_a1_vert = []
angle_a2_vert = []
angle_b1_vert = []
angle_b2_vert = []
#Refract为折射率测量数组
angle_a1_refract = []
angle_a2_refract = []
angle_b1_refract = []
angle_b2_refract = []

global average_A,uA

average_A = 0
uA = 0

env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

#科学计数法消除e
def ToScience(number):
    Tempstr = format(number,'.4g')
    #如果发现Tempstr中含有e的话，说明是科学计数法
    if 'e' in  Tempstr:
        index_str = Tempstr.split('e')
        return index_str[0]+'{\\times}10^{'+str(int(index_str[1]))+'}'
    else:
        return Tempstr


#分度转角度
def Angle(angle):
    angle = int(angle) + (angle-int(angle))*100/60
    return angle

#度转弧度
def change(x):
    x = x/180*pi
    return x

#角度的值的变换
def ChangeAngle(angle,n):
    angle = abs(angle)
    if angle > 200 :
        return 360 - angle
    return angle

#计算a类不确定度
def Ua(x, aver, k) :
    sumx = 0
    for i in range(k):
        sumx += (x[i] - aver)**2
    return sqrt(sumx/(k*(k-1)))

def BitAdapt(x,u_x) :
    ten = 0
    if (u_x >= 10):
        temp = x
        while(temp >= 10):
            temp = temp/10
            ten += 1
        x = float(x)/10**ten
        u_x = float(u_x)/10**ten
    i = 0
    while(1):
        temp = u_x*(10**i)
        if(temp >= 1):
            bit = i
            break;
        else :
            i+=1
    u_x = round(u_x,bit)
    x = round(x,bit)
    res = []
    res.append(x)
    res.append(u_x)
    res.append(ten)
    return res


def ReadXmlTop():
    #打开统一的头文件模版
    latex_head_file = open('D://latex//Head.tex','r')
    latex_head = latex_head_file.read().decode('utf-8', 'ignore')
    latex_tail = "\n\\end{document}"
    latex_body = ""

    dom = xml.dom.minidom.parse('D://latex//1071.xml')
    #文档的根结点
    root = dom.documentElement
    #获取到每个小实验的对应标签
    sublab_list = root.getElementsByTagName('sublab')
    for sublab in sublab_list:
        sublab_status = sublab.getAttribute("status")
        sublab_id = sublab.getAttribute("id")
        #如果status为true，表明用户选择了该小实验
        if (sublab_status == 'true' )& (sublab_id == '10711'):
            ReadXml10711(sublab)
            latex_body += Handle10711()
        elif (sublab_status == 'true')& (sublab_id == '10712'):
            ReadXml10712(sublab)
            latex_body +="\n"+Handle10712()
    return latex_head+latex_body+latex_tail


#sublab_root为子实验的根结点
def ReadXml10711(sublab_root):
    #声明全局变量
    global angle_a1_vert,angle_a2_vert,angle_b1_vert,angle_b2_vert

    sublab_table_list = sublab_root.getElementsByTagName("table")

    #tr是指第几行，其中的index属性代表了其行数
    sublab_table_list = sublab_root.getElementsByTagName("table")
    for table in sublab_table_list:
        table_name = table.getAttribute("name")
        #tr是指第几行，其中的index属性代表了其行数
        table_tr_list = table.getElementsByTagName("tr")
        for tr in table_tr_list:
            tr_index = tr.getAttribute("index")
            index = int(tr_index)
            tr_td_list = tr.getElementsByTagName("td")
            angle_a1_vert.append(float(tr_td_list[0].firstChild.nodeValue))
            angle_a2_vert.append(float(tr_td_list[1].firstChild.nodeValue))
            angle_b1_vert.append(float(tr_td_list[2].firstChild.nodeValue))
            angle_b2_vert.append(float(tr_td_list[3].firstChild.nodeValue))


def ReadXml10712(sublab_root):
    #声明全局变量
    global angle_a1_refract,angle_a2_refract,angle_b1_refract,angle_b2_refract,uA,average_A

    sublab_table_list = sublab_root.getElementsByTagName("table")
    for table in sublab_table_list:
        table_name = table.getAttribute("name")
        table_raw  = table.getAttribute("raw")
        table_column = table.getAttribute("column")
        #tr是指第几行，其中的index属性代表了其行数
        table_tr_list = table.getElementsByTagName("tr")
        for tr in table_tr_list:
            tr_index = tr.getAttribute("index")         
            index = int(tr_index)
            tr_td_list = tr.getElementsByTagName("td")
            angle_a1_refract.append(float(tr_td_list[0].firstChild.nodeValue))
            angle_b1_refract.append(float(tr_td_list[1].firstChild.nodeValue))
            angle_a2_refract.append(float(tr_td_list[2].firstChild.nodeValue))
            angle_b2_refract.append(float(tr_td_list[3].firstChild.nodeValue))
            print angle_a1_refract

def VertAngle(source,ANGLE_A1,ANGLE_A2,ANGLE_B1,ANGLE_B2):
    global angle_a1_vert,angle_a2_vert,angle_b1_vert,angle_b2_vert,uA,average_A
    precision = 1.0/60  #精度，此处默认为1'
    sum_A = 0
    k = len(angle_a1_vert)
    angle_A = []
    angle_theta = []

    for i in range(k):
        temp1 = Angle(angle_a2_vert[i]) - Angle(angle_a1_vert[i])
        temp1 = ChangeAngle(temp1,200)
        temp2 = Angle(angle_b2_vert[i]) - Angle(angle_b1_vert[i])
        temp2 = ChangeAngle(temp2,200)
        temp = (temp1 + temp2) / 2
        angle_theta.append(temp)
        angle_A.append(temp / 2)
        sum_A += temp/2

    ANGLE_A = []
    ANGLE_THETA = []

    for a in angle_A:
        minus = int(round((a - int(a))*60))
        ANGLE_A.append({'angle':str(int(a)),'minus':str(minus)})

    for theta in angle_theta:
        minus = int(round((theta - int(theta))*60))
        ANGLE_THETA.append({'angle':str(int(theta)),'minus':str(minus)})
    
    average_A = sum_A / k
    #大写的是弧度表示
    AVERAGE_A = change(average_A)
    AVERAGE_A = ToScience(AVERAGE_A)

    ua_theta = Ua(angle_A, average_A, k)
    #大写的是弧度表示
    UA_THETA = change(ua_theta)
    UA_THETA = ToScience(UA_THETA)

    ub_theta =precision / sqrt(3)
    u_theta = sqrt(pow(ua_theta,2) + pow(ub_theta,2))
    #大写的是弧度表示
    U_THETA = change(u_theta)
    U_THETA = ToScience(U_THETA)

    uA = u_theta/2
    #大写的弧度表示
    U_A = change(uA)
    U_A = ToScience(U_A)

    re_u= uA / average_A #相对不确定度
    RE_U = change(re_u)
    RE_U = ToScience(RE_U)

    RESULT = BitAdapt(change(average_A),change(uA))
    RESULT_A = RESULT[0]
    RESULT_UA = RESULT[1]

    result = env.from_string(source).render(
        ANGLE_A = ANGLE_A,
        ANGLE_THETA = ANGLE_THETA,
        ANGLE_A1_VERT = ANGLE_A1,
        ANGLE_A2_VERT = ANGLE_A2,
        ANGLE_B1_VERT = ANGLE_B1,
        ANGLE_B2_VERT = ANGLE_B2,
        AVERAGE_A = AVERAGE_A,
        UA_THETA = UA_THETA,
        U_THETA = U_THETA,
        U_A = U_A,
        RE_U = RE_U,
        RESULT_A = RESULT_A,
        RESULT_UA = RESULT_UA
        )

    return result

#做法:ReadXml文件里应该先对每个实验进行不同的读xml文件的操作
def Handle10711():
    global angle_a1_vert,angle_a2_vert,angle_b1_vert,angle_b2_vert
    #载入1071三角型顶角测量数据处理模板
    file_object = open("D://latex//Handle10711.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')

    angle_a1_vert = [82.55,120,158.38,43.55,45.57]
    angle_a2_vert = [323,0.11,38.46,284,287]
    angle_b1_vert = [262.54,300,338.39,223.55,225.57]
    angle_b2_vert = [142.56,180.04,218.45,104,106]

    ANGLE_A1 = []
    ANGLE_A2 = []
    ANGLE_B1 = []
    ANGLE_B2 = []

    for a1 in angle_a1_vert:
        tempstr = str(a1-int(a1))
        if '.' in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_A1.append({'angle':int(a1),'minus':tempstr})

    for a2 in angle_a2_vert: 
        tempstr = str(a2-int(a2))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_A2.append({'angle':int(a2),'minus':tempstr})

    for b1 in angle_b1_vert:
        tempstr = str(b1-int(b1))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_B1.append({'angle':int(b1),'minus':tempstr})

    for b2 in angle_b2_vert:
        tempstr = str(b2-int(b2))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_B2.append({'angle':int(b2),'minus':tempstr})
    
    #调用主要处理函数
    source = VertAngle(source,ANGLE_A1,ANGLE_A2,ANGLE_B1,ANGLE_B2)

    return source


def Handle10712():
    global angle_a1_refract,angle_b1_refract,angle_a2_refract,angle_b2_refract,uA,average_A

    ANGLE_A1 = []
    ANGLE_A2 = []
    ANGLE_B1 = []
    ANGLE_B2 = []

    file_object = open("D://latex//Handle10712.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')
    
    for a1 in angle_a1_refract:
        tempstr = str(a1-int(a1))
        if '.' in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_A1.append({'angle':int(a1),'minus':tempstr})

    for a2 in angle_a2_refract: 
        tempstr = str(a2-int(a2))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_A2.append({'angle':int(a2),'minus':tempstr})

    for b1 in angle_b1_refract:
        tempstr = str(b1-int(b1))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_B1.append({'angle':int(b1),'minus':tempstr})

    for b2 in angle_b2_refract:
        tempstr = str(b2-int(b2))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_B2.append({'angle':int(b2),'minus':tempstr})

    source = Refract(source,ANGLE_A1,ANGLE_A2,ANGLE_B1,ANGLE_B2)

    return source


def Refract(source,ANGLE_A1_MIN,ANGLE_A2_MIN,ANGLE_B1_MIN,ANGLE_B2_MIN):
    precision = 1.0/60  #精度，此处默认为1'
    angle_min = []
    ANGLE_DELTA_MIN = []
    sum_min = 0
    k = len(angle_a1_refract)
    for i in range(k) :
        temp1 = Angle(angle_a2_refract[i]) - Angle(angle_a1_refract[i])
        temp1 = ChangeAngle(temp1,100)
        temp2 = Angle(angle_b2_refract[i]) - Angle(angle_b1_refract[i])
        temp2 = ChangeAngle(temp2,100)
        temp = (temp1 + temp2) / 2
        angle_min.append(temp)
        tempstr = round(temp-int(temp)*60,2)
        tempstr = str(tempstr)
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_DELTA_MIN.append({'angle':int(temp),'minus':tempstr})
        sum_min += temp

    average_min = sum_min / k
    average_min_rad = change(average_min)
    AVERAGE_MIN = ToScience(average_min_rad)

    AVERAGE_A = change(average_A)
    AVERAGE_A = ToScience(AVERAGE_A)

    n1 = sin(change( (average_min+average_A) / 2 )) / sin(change(average_A / 2))
    N1 = ToScience(n1)

    ua_min = Ua(angle_min, average_min, k)
    #弧度
    ua_min = change(ua_min)
    UA_MIN = ToScience(ua_min)

    #A的不确定度
    U_A = change(uA)
    U_A = ToScience(U_A)


    ub_min = precision/sqrt(3)
    ub_min = change(ub_min)
    UB_MIN = ToScience(ub_min)

    u_min = sqrt(pow(ua_min,2) + pow(ub_min,2))
    U_MIN = ToScience(u_min)

    temp1 = cos(change((average_min + average_A)/2)) * u_min / 2 / sin(change(average_A/2))
    temp2 = sin(change(average_min/2))*change(uA)/2/pow(sin(change(average_A/2)),2)
    u_n1 = sqrt(pow(temp1,2)+pow(temp2,2))
    U_N1 = ToScience(u_n1)

    re_u = u_n1/n1 #相对不确定度
    RE_U_MIN = ToScience(re_u)

    RESULT = BitAdapt(n1,u_n1)
    RESULT_N1 = RESULT[0]
    RESULT_U_N1 = RESULT[1]

    result = env.from_string(source).render(
        ANGLE_DELTA_MIN = ANGLE_DELTA_MIN,
        ANGLE_A1_MIN = ANGLE_A1_MIN,
        ANGLE_A2_MIN = ANGLE_A2_MIN,
        ANGLE_B1_MIN = ANGLE_B1_MIN,
        ANGLE_B2_MIN = ANGLE_B2_MIN,
        AVERAGE_A = AVERAGE_A,
        AVERAGE_MIN = AVERAGE_MIN,
        U_A = U_A,
        RE_U_MIN = RE_U_MIN,
        UA_MIN = UA_MIN,
        N1 = N1,
        U_MIN = U_MIN,
        U_N1 = U_N1,
        RESULT_N1 = RESULT_N1,
        RESULT_U_N1 = RESULT_U_N1
        )

    return result


if __name__ == '__main__':
    finish_str = ReadXmlTop()
    finish_file = open("D://latex//1071finish.tex","w")
    finish_file.write(finish_str.encode('utf-8', 'ignore'))
    finish_file.close()
