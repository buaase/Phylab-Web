# -*- coding: utf-8 -*-
#-------10411 伏安法测中电阻--------------------------------
'''
input:
    R1 内接测出来的电阻 单位 Ω
    R2 外接测出来的电阻 单位 Ω
    R_o 欧姆表测得的电阻 单位 Ω
    U[] 一维列表 测得的电压 单位V
    I[] 一维列表 测得的电流 单位mA
output:
    R1,R2,R_o,U,I
    mark 内外接选择：0为内接，1为外接
    b,r 一元线性处理的结果
    R 所测的电阻 单位Ω
    ua_R R的A类不确定度
    u_R R的不确定度
    res 最终结果的表示形式  (R +- u_R)
'''
#标准函数处理文件
import phylab
from jinja2 import Template
from jinja2 import Environment
from math import sqrt

env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

def VA_MR(R1,R2,R_o,U,I,source):
    mark = 0
    temp1 = abs(R1 - R_o)/R_o
    temp2 = abs(R2 - R_o)/R_o
    if temp1 > temp2:
        mark = 1

    U.append(sum(U)/len(U))
    I.append(sum(I)/len(I))

    #一元线性回归计算R
    res = phylab.ULR(I,U)
    b = res[0]
    r = res[1]
    R = b*1000
    ua_R = b * sqrt( (1/pow(r,2)-1)/(len(U)-1 - 2) ) * 1000
    u_R = ua_R
    res = phylab.BitAdapt(R,u_R)
    phylab.RoundOne(U,1)
    phylab.RoundOne(I,1)
    b = round(b,7)
    r = round(r,7)
    R = round(R,4)
    u_R = round(u_R,3)
    ua_R = round(ua_R,3)

    result = env.from_string(source).render(
        R1 = R1,
        R2 = R2,
        R_o = R_o,
        U = U,
        I = I,
        MARK = mark,
        b = b,
        r = r,
        R = R,
        UA_R = ua_R,
        U_R = u_R,
        RES = res
        )
    return result 


def ReadXmlVA_MR():
    #载入数据处理模板
    file_object = open("Handle10411.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')
    
    source = ObjectImageConcave(source)

    return source

if __name__ == '__main__':
    nstr = ReadXmlVA_MR()
    nfile = open('Handle10411finish.tex','w')
    nfile.write(nstr.encode('utf-8', 'ignore'));
    nfile.close();

