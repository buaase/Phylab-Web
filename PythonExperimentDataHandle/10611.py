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

env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

#calculate the average of two Convex and add into exper
def Average(exper):
    for i in range(3):
        aver = (exper[i][2] + exper[i][3]) / 2
        exper[i].append(aver)
    
def Round(x):
    for i in range(len(x)):
        for j in range(len(x[i])):
            x[i][j] = round(x[i][j],2)

def ObjectImageConvex(exper_1, exper_2, exper_3,source):
    u,v,f = [], [], []
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
            x = exper[j][4] - exper[j][0] #######
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

    Round(exper_1)
    Round(exper_2)
    Round(exper_3)
    Round(u)
    Round(v)
    Round(f)
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
#----test--------#
'''
exper_1 = [[1400.0,469.2,1011.5,1014.8],
           [1400,492.3,1001.8,1004.6],[1400.0,426.1,1040.3,1037.8]]
exper_2 = [[1400.0,507.1,934.1,936.9],
           [1400.0,531.2,947.8,947.6],[1400.0,539.8,952.9,954.1]]
exper_3 = [[1400.0,410.5,716.9,715.4],
           [1400.0,397.1,712.8,711.0],[1400.0,370.4,674.9,672.6]]
ObjectImageConvex(exper_1, exper_2, exper_3)
'''

def ReadXmlObjectImageConvex():
    #载入1071三角型顶角测量数据处理模板
    file_object = open("E://phylab//Handle10611.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')

    exper_1 = [[1400.0,469.2,1011.5,1014.8],
           [1400,492.3,1001.8,1004.6],[1400.0,426.1,1040.3,1037.8]]
    exper_2 = [[1400.0,507.1,934.1,936.9],
           [1400.0,531.2,947.8,947.6],[1400.0,539.8,952.9,954.1]]
    exper_3 = [[1400.0,410.5,716.9,715.4],
           [1400.0,397.1,712.8,711.0],[1400.0,370.4,674.9,672.6]]
    
    source = ObjectImageConvex(exper_1, exper_2, exper_3,source)

    return source

if __name__ == '__main__':
    nstr = ReadXmlObjectImageConvex()
    nfile = open('E://phylab-temp//Handle10611finish.tex','w')
    nfile.write(nstr.encode('utf-8', 'ignore'));
    nfile.close();
