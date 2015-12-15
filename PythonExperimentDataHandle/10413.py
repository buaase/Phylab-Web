# -*- coding: utf-8 -*-
#-------10413 伏安法测高电阻--------------------------------
'''
input:
    ki 检流计电流常数，设置为全局变量 单位A/div
    d 检流计格数，设置为全局变量 单位div
    Rg 检流计内阻，设置为全局变量 单位Ω
    U_ki ki的不确定度，设置为全局变量，单位A/div
    U_d d的不确定度，设置为全局变量，单位div

    Rs 单位 Ω 
    U 电压表示数 单位V
    delta_V 电压表的仪器误差限 单位V
output:
    R_ki,R_d,R_Rg,R_U_ki,R_U_d,R_Rs,R_U
    R_Rx 粗略所测高电阻的阻值 单位Ω
    R_fRx 修正后的高电阻的阻值 单位Ω
    R_delta_Rs,R_delta_V Rs和电压表的仪器误差限 单位Ω
    R_U_Rs,R_U_Rg,R_U_V Rs,Rg和电压表的不确定度 单位Ω
    R_UfRx fRx的不确定度之前那一步
    R_U_fRx fRx的不确定度 单位Ω
    R_res_fRx fRx的最终形式 单位Ω
'''
#标准函数处理文件
import phylab
#from jinja2 import Template
#from jinja2 import Environment
from math import sqrt

ki = 2.09*pow(10,-8)
d = 50
Rg = 9908.1
U_ki = 6.34*pow(10,-10)
U_d = 0.2887

#env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

def VA_HR(Rs,U,delta_V):
    global ki
    global d
    global Rg
    global U_ki
    global U_d
    if ki == 0:
        return
    Rx = (Rs*U) / ((Rs + Rg)*ki*d)
    fRx = (Rs*U) / ((Rs + Rg)*ki*d) - Rg*Rs/(Rg + Rs)

    #不确定度计算
    delta_Rs = phylab.DELTA_R(Rs)
    delta_Rg = phylab.DELTA_R(Rg)
    U_Rs = delta_Rs/sqrt(3)
    U_Rg = delta_Rg/sqrt(3)
    U_V = delta_V/sqrt(3)

    a1 = pow(Rg*U_Rs/(Rs*(Rg+Rs)) , 2)
    a2 = pow(U_V/(U-ki*d*Rg) , 2)
    a3 = pow((d*Rg/(U-ki*d*Rg)+1/ki)*U_ki,2)
    a4 = pow((ki*Rg/(U-ki*d*Rg)+1/d)*U_d,2)
    a5 = pow((ki*d/(U-ki*d*Rg)+1/(Rg+Rs))*U_Rg,2)
    UfRx = sqrt(a1+a2+a3+a4+a5)
    U_fRx = UfRx * fRx

    res_fRx = phylab.BitAdapt(fRx,U_fRx)
    print "res_fRx:" + res_fRx
    r_U = round(U,2)
    print "U:" + str(r_U)
    r_d = ("%d" %d)
    print "d:" + r_d
    r_Rs = ("%d" %Rs)
    print "Rs:" + r_Rs
    r_Rx = phylab.ToScience(Rx)
    print "Rx:" + r_Rx
    r_fRx = phylab.ToScience(fRx)
    print "fRx:" + r_fRx
    r_delta_Rs = round(delta_Rs,2)
    print "delta_Rs:" + str(r_delta_Rs)
    r_U_Rs = round(U_Rs,3)
    print "U_Rs:" + str(r_U_Rs)
    r_U_Rg = round(U_Rg,3)
    print "U_Rg:" + str(r_U_Rg)
    r_delta_V = round(delta_V,3)
    print "delta_V:" + str(r_delta_V)
    r_U_V = round(U_V,4)
    print "U_V:" + str(r_U_V)
    r_U_ki = phylab.ToScience(U_ki)
    print "U_ki:" + r_U_ki
    r_U_d = round(U_d,4)
    print "U_d:" + str(r_U_d)
    r_UfRx = phylab.ToScience(UfRx)
    print "UfRx:" + r_UfRx
    r_U_fRx = phylab.ToScience(U_fRx)
    print "U_fRx:" + r_U_fRx

U = 1.14
Rs = 9000
delta_V = 0.075
VA_HR(Rs,U,delta_V)
'''
    result = env.from_string(source).render(
        R_U = r_U,
        R_d = r_d,
        R_Rs = r_Rs,
        R_Rx = r_Rx,
        R_fRx = r_fRx,
        R_delta_Rs = r_delta_Rs
        R_U_Rs = r_U_Rs,
        R_U_Rg = r_U_Rg,
        R_delta_V = r_delta_V,
        R_U_V = r_U_V,
        R_U_ki = r_U_ki,
        R_U_d = r_U_d,
        R_UfRx = r_UfRx,
        R_U_fRx = r_U_fRx,
        R_res_fRx = res_fRx
        )
    return result 


def ReadXmlVA_HR():
    #载入数据处理模板
    file_object = open("Handle10413.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')
    
    source = VA_HR(source)

    return source

if __name__ == '__main__':
    nstr = ReadXmlVA_HR()
    nfile = open('Handle10413finish.tex','w')
    nfile.write(nstr.encode('utf-8', 'ignore'));
    nfile.close();
'''
