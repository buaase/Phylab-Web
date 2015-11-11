# -*- coding: utf-8 -*-
#实验一、物距像距法测凸透镜焦距
'''
input:
    exper_1 = []    三个实验情况，每一个都是一个二维列表[光源，光屏，凸透镜1，凸透镜2]
    exper_2 = []    运算过程中会在末尾添加一个凸透镜的均值
    exper_3 = []
output:
    物距u = []  像距v = []
    焦距f = []
'''
from jinja2 import Template
from jinja2 import Environment
from math import sqrt
import xml.dom.minidom
import os
import json
import sys
import subprocess

env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

def Ua(x, aver, k) :
    sumx = 0
    for i in range(k):
        sumx += (x[i] - aver)**2
    return sqrt(sumx/(k*(k-1)))

#不确定度位数对齐
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


#calculate the average of two Convex and add into exper
def Average(exper):
    for i in range(3):
        aver = (exper[i][2] + exper[i][3]) / 2
        exper[i].append(aver)
    
def RoundTwo(x):
    for i in range(len(x)):
        for j in range(len(x[i])):
            x[i][j] = round(x[i][j],2)

def ObjectImageConvex(exper_1, exper_2, exper_3,source):
    u,v,f = [], [], []
    delta = 35.5
    for i in range(3) :
        if i == 0 :
            exper = exper_1
        elif i == 1 :
            exper = exper_2
        else :
            exper = exper_3
        Average(exper)
        temp_u = []
        temp_v = []
        temp_f = []
        sum_f = 0
        for j in range(3):
            x = abs(exper[j][4] - exper[j][0]) - delta
            temp_u.append(x)
            y = abs(exper[j][1]-exper[j][4])
            temp_v.append(y)
            z = x*y/(x+y)
            sum_f += z
            temp_f.append(z)
        temp_f.append(sum_f/3)
        u.append(temp_u)
        v.append(temp_v)
        f.append(temp_f)
    average_f = 0
    for i in range(3) :
        average_f += f[i][3]
    average_f /= 3

    RoundTwo(exper_1)
    RoundTwo(exper_2)
    RoundTwo(exper_3)
    RoundTwo(u)
    RoundTwo(v)
    RoundTwo(f)
    result = env.from_string(source).render(
        EXPER_1 = exper_1,
        EXPER_2 = exper_2,
        EXPER_3 = exper_3,
        U = u,
        V = v,
        f = f,
        Average_f = round(average_f,2)
        )
    return result

def ReadXml10611(sublab_root):
    #载入数据处理模板
    file_object = open("Handle10611.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')

    sublab_table_list = sublab_root.getElementsByTagName("table")
    for table in sublab_table_list:
        table_name = table.getAttribute("name")
        table_raw  = table.getAttribute("raw")
        table_column = table.getAttribute("column")

        table_tr_list = table.getElementsByTagName("tr")
        for tr in table_tr_list:
            tr_index = tr.getAttribute("index")
            index = int(tr_index)
            tr_td_list = tr.getElementsByTagName("td")
            if index>=1 && index<=3 :
                sub_exper_1 =[]
                for td in tr_td_list:
                    sub_exper_1.append(float(td.firstChild.nodeValue))
                exper_1.append(sub_exper_1)
            elif index>=4 && index<=6 :
                sub_exper_2 =[]
                for td in tr_td_list:
                    sub_exper_2.append(float(td.firstChild.nodeValue))
                exper_2.append(sub_exper_2)
            elif index>=7 && index<=9:
                sub_exper_3 =[]
                for td in tr_td_list:
                    sub_exper_3.append(float(td.firstChild.nodeValue))
                exper_3.append(sub_exper_3)

    #exper_1 = [[1400.0,469.2,1011.5,1014.8],
    #       [1400,492.3,1001.8,1004.6],[1400.0,426.1,1040.3,1037.8]]
    #exper_2 = [[1400.0,507.1,934.1,936.9],
    #       [1400.0,531.2,947.8,947.6],[1400.0,539.8,952.9,954.1]]
    #exper_3 = [[1400.0,410.5,716.9,715.4],
    #       [1400.0,397.1,712.8,711.0],[1400.0,370.4,674.9,672.6]]
    
    source = ObjectImageConvex(exper_1, exper_2, exper_3,source)

    return source

def RoundOne(x,b):
    for i in range(len(x)):
        x[i] = round(x[i],b)

def ObjectImageConcave(exper,source):
    u,v,f = [],[],[]
    sum_f = 0
    for i in range(3):
        aver = (exper[i][1] + exper[i][2])/2
        exper[i].append(aver)
        temp_u = exper[i][0] - aver
        u.append(temp_u)
        temp_v = abs(exper[i][3] -aver)
        v.append(temp_v)
        temp_f = temp_u*temp_v/(temp_u+temp_v)
        sum_f += temp_f
        f.append(temp_f)
    average_f = sum_f/3
    RoundTwo(exper,2)
    RoundOne(f,2)
    RoundOne(u,2)
    RoundOne(v,2)
    result = env.from_string(source).render(
        EXPER = exper,
        F = f,
        U = u,
        V = v,
        AVERAGE_F = round(average_f,2)
        )
    return result

def ReadXml10613(sublab_root):
    #载入数据处理模板
    file_object = open("Handle10613.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')

    sublab_table_list = sublab_root.getElementsByTagName("table")
    for table in sublab_table_list:
        table_name = table.getAttribute("name")
        table_raw  = table.getAttribute("raw")
        table_column = table.getAttribute("column")

        table_tr_list = table.getElementsByTagName("tr")
        for tr in table_tr_list:
            tr_index = tr.getAttribute("index")
            index = int(tr_index)
            tr_td_list = tr.getElementsByTagName("td")
            sub_exper=[]
            for td in tr_td_list:
                sub_exper.append(float(td.firstChild.nodeValue))
            exper.append(sub_exper)

    #exper = [[949.1,990.3,988.8,808.1],
    #     [950.8,989.9,986.2,841.7],[949.8,987.1,987.9,834.5]]
    
    source = ObjectImageConcave(exper,source)

    return source

def CollimatedConvex(exper,source):
    f = []
    sum_f = 0
    delta = 35.5
    for i in range(5):
        aver = (exper[i][1] + exper[i][2])/2
        exper[i].append(aver)
        temp_f = exper[i][0] - aver - delta
        sum_f += temp_f
        f.append(temp_f)
    average_f = sum_f / 5
    ua_f = Ua(f,average_f,len(f))
    ub_f = 0.5/sqrt(3)
    uf = sqrt(pow(ua_f,2) + pow(ub_f,2))
    res = BitAdapt(average_f,uf)
    final_f = res[0]
    final_u = res[1]
    RoundTwo(exper,2)
    RoundOne(f,2)
    result = env.from_string(source).render(
        EXPER = exper,
        F = f,
        AVERAGE_F = round(average_f,2),
        UA_F = round(ua_f,2),
        UB_F = round(ub_f,2),
        UF = round(uf,2),
        DELTA = delta,
        FINAL_F = final_f,
        FINAL_U = final_u
        )
    return result

def ReadXml10612(sublab_root):
    #载入数据处理模板
    file_object = open("Handle10612.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')

    sublab_table_list = sublab_root.getElementsByTagName("table")

    for table in sublab_table_list:
        table_name = table.getAttribute("name")
        table_raw  = table.getAttribute("raw")
        table_column = table.getAttribute("column")

        table_tr_list = table.getElementsByTagName("tr")
        for tr in table_tr_list:
            tr_index = tr.getAttribute("index")
            index = int(tr_index)
            tr_td_list = tr.getElementsByTagName("td")
            sub_exper  =[]
            for td in tr_td_list:
                sub_exper.append(float(td.firstChild.nodeValue))
            exper.append(sub_exper)

    #exper = [[1400,1315.2,1311.9],[1300.0,1213.9,1209.9],
    #     [1200.0,1116.1,1118.3],[1100.0,1014.8,1013.9],
    #     [1000.0,916.7,918.2]]
    
    source = CollimatedConvex(exper,source)

    return source

def ReadXmlTop():
    latex_head_file = open('Head.tex','r')
    latex_head = latex_head_file.read().decode('utf-8', 'ignore')
    latex_tail = "\n\\end{document}"
    latex_body = ""

    dom = xml.dom.minidom.parse(sys.argv[1]+".xml")
    #获取根结点
    root = dom.documentElement
    #获取sub_list结点数组
    #1061有三个子实验结点
    sublab_list = root.getElementsByTagName('sublab')
    for sublab in sublab_list:
        sublab_status = sublab.getAttribute("status")
        sublab_id = sublab.getAttribute("id")
        #获取sublab的id
        if (sublab_status == 'true' )& (sublab_id == '10611'):
            latex_body += ReadXml10611(sublab)
        elif (sublab_status == 'true')& (sublab_id == '10612'):
            latex_body +="\n"+ReadXml10612(sublab)
        elif (sublab_status == 'true'& (sublab_id == '10613'):
            latex_body +="\n"+ReadXml10613(sublab)

    return latex_head+latex_body+latex_tail

if __name__ == '__main__':
    try:
        finish_str = ReadXmlTop()
        finish_file = open(sys.argv[2]+".tex","w")
        finish_file.write(finish_str.encode('utf-8', 'ignore'))
        finish_file.close()
        #等于１时是错误
        ret =  subprocess.call("pdflatex -interaction=nonstopmode "+sys.argv[2]+".tex",shell=True)
        subprocess.call("rm "+sys.argv[2]+".aux",shell=True)        
        subprocess.call("rm "+sys.argv[2]+".synctex*",shell=True)
        subprocess.call("rm "+sys.argv[2]+".log",shell=True)
        if ret==0:
            print('{"status":"success"}')
        else:
            print('{"status":"fail"}')
    except Exception as e:
        #print(traceback.format_exc())
        print('{"status":"fail"}')