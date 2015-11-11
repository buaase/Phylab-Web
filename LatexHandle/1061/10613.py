# -*- coding: utf-8 -*-
#实验三、自准直法测凸透镜焦距
'''
input:
    exper = []  [光源，凸透镜1，凸透镜2] 运算过程中会在末尾添加一个凸透镜的均值
output:
    f = []
    ua_f  ub_f  u_f
'''

from jinja2 import Template
from jinja2 import Environment
from math import sqrt

env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

def RoundTwo(x,b):
    for i in range(len(x)):
        for j in range(len(x[i])):
            x[i][j] = round(x[i][j],b)

def RoundOne(x,b):
    for i in range(len(x)):
        x[i] = round(x[i],b)
        
#计算a类不确定度
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
            u_x = ("%.1f" % u_x)
            x = ("%.1f" % x)
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

def ReadXmlCollimatedConvex():
    #载入数据处理模板
    file_object = open("E://phylab//Handle10613.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')

    exper = [[1400,1315.2,1311.9],[1300.0,1213.9,1209.9],
         [1200.0,1116.1,1118.3],[1100.0,1014.8,1013.9],
         [1000.0,916.7,918.2]]
    
    source = CollimatedConvex(exper,source)

    return source

if __name__ == '__main__':
    nstr = ReadXmlCollimatedConvex()
    nfile = open('E://phylab-temp//Handle10613finish.tex','w')
    nfile.write(nstr.encode('utf-8', 'ignore'));
    nfile.close();
