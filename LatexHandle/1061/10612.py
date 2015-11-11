# -*- coding: utf-8 -*-
#实验二、物距像距法测凹透镜焦距
'''
input:
    exper = []   [屏1，凹透镜1，凹透镜2，屏2]  运算过程中会在末尾添加一个凹透镜的均值
output:
    物距u = []  像距v = []
    焦距f = []
'''

from jinja2 import Template
from jinja2 import Environment

env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

def RoundTwo(x,b):
    for i in range(len(x)):
        for j in range(len(x[i])):
            x[i][j] = round(x[i][j],b)

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

def ReadXmlObjectImageConvex():
    #载入数据处理模板
    file_object = open("E://phylab//Handle10612.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')

    exper = [[949.1,990.3,988.8,808.1],
         [950.8,989.9,986.2,841.7],[949.8,987.1,987.9,834.5]]
    
    source = ObjectImageConcave(exper,source)

    return source

if __name__ == '__main__':
    nstr = ReadXmlObjectImageConvex()
    nfile = open('E://phylab-temp//Handle10612finish.tex','w')
    nfile.write(nstr.encode('utf-8', 'ignore'));
    nfile.close();
