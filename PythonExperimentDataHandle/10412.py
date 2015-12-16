# -*- coding: utf-8 -*-
#-------10412 测检流计内阻与电流常数--------------------------------
'''
input:
    R1 固定电阻 Ω
    d 检流计的格数 单位div
    满偏时 R0 单位Ω U 单位V
    半偏时 R2 单位Ω
    delta_V 电压表仪器误差限 V
output:
    R1 R0 R2 d U
    ki 电流常数 单位A/div
    delta_R1,delta_R0,delta_Rg R1,R0,Rg的仪器误差限 单位Ω
    U_R1,U_R0,U_V,U_d,U_Rg R1,R0,V,d,Rg的不确定度 单位Ω
    res_Rg Rg的最终结果形式

'''
#标准函数处理文件
import phylab
#from jinja2 import Template
#from jinja2 import Environment
from math import sqrt

#env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

def MeasureGalvo(R0,R1,R2,U,d,delta_V):
    Rg = R2
    ki = R1*U/((R0+R1)*R2*d)
    #不确定度计算
    delta_R2 = phylab.DELTA_R(R2)
    U_Rg = delta_R2/sqrt(3)
    delta_R1 = phylab.DELTA_R(R1)
    U_R1 = delta_R1/sqrt(3)
    delta_R0 = phylab.DELTA_R(R0)
    U_R0 = delta_R0/sqrt(3)
    U_V = delta_V/sqrt(3)
    U_d = 0.5/sqrt(3)
    Uki = pow(R0*U_R0/(R1*(R0+R1)) , 2)
    Uki = Uki + pow(U_V/U , 2)
    Uki = Uki + pow(U_R0/(R0 + R1) , 2)
    Uki = Uki + pow(U_Rg/Rg , 2)
    Uki = Uki + pow(U_d/d , 2)
    Uki = sqrt(Uki)
    U_ki = Uki * ki

    res_Rg = phylab.BitAdapt(Rg,U_Rg)
    print " res_Rg:" + res_Rg
    res_ki = phylab.BitAdapt(ki,U_ki)
    print " res_ki:" + res_ki
    R0 = round(R0,1)
    print " R0:" + str(R0)
    Rg = round(Rg,1)
    print " Rg:" + str(Rg )
    R2 = round(R2,1)
    print "R2 :" + str( R2)
    d = ("%.0f" %d)
    print " d:" + d
    U = round(U,1)
    print " U:" + str( U)
    R1 = ("%.0f" %R1)
    print "R1 :" + R1
    ki = phylab.ToScience(ki)
    print " ki:" + ki
    delta_R0 = round(delta_R0,3)
    print " delta_R0:" + str(delta_R0 )
    delta_R1 = round(delta_R1,3)
    print " delta_R1:" + str(delta_R1 )
    delta_R2 = round(delta_R2,3)
    print " delta_R2:" + str( delta_R2)
    delta_V = round(delta_V,3)
    print " delta_V:" + str(delta_V )
    U_R0 = round(U_R0,4)
    print " U_R0:" + str(U_R0 )
    U_R1 = round(U_R1,4)
    print " U_R1:" + str( U_R1)
    U_Rg = round(U_Rg,4)
    print " U_Rg:" + str(U_Rg )
    U_V = round(U_V,4)
    print " U_V:" + str(U_V )
    U_d = round(U_d,4)
    print " U_d:" + str(U_d )
    Uki = round(Uki,5)
    print " Uki:" + str(Uki )
    U_ki = phylab.ToScience(U_ki)
    print " U_ki:" + U_ki

R0 = 1149.8
R1 = 8
R2 = 9908.1
d = 50
U = 1.5
delta_V = 0.075
MeasureGalvo(R0,R1,R2,U,d,delta_V)
'''
    result = env.from_string(source).render(
        R0 = round(R0,1),
        R1 = ("%.0f" %R1),
        Rg = round(Rg,1,
        R2 = round(R2,1),
        d = ("%.0f" %d),
        U = round(U,1),
        ki = phylab.ToScience(ki),
        delta_R0 = round(delta_R0,3),
        delta_R1 = round(delta_R1,3),
        delta_R2 = round(delta_R2,3),
        delta_V = round(delta_V,3),
        U_R0 = round(U_R0,4),
        U_R1 = round(U_R1,4),
        U_Rg = round(U_Rg,4),
        U_V = round(U_V,4),
        U_d = round(U_d,4),
        Uki = round(Uki,5),
        U_ki = phylab.ToScience(U_ki),
        res_Rg = res_Rg,
        res_ki = res_ki
        )
    return result 


def ReadXmlMeasureGalvo():
    #载入数据处理模板
    file_object = open("Handle10412.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')
    
    source = MeasureGalvo(source)

    return source

if __name__ == '__main__':
    nstr = ReadXmlMeasureGalvo()
    nfile = open('Handle10412finish.tex','w')
    nfile.write(nstr.encode('utf-8', 'ignore'));
    nfile.close();
'''
