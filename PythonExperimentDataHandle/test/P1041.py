# -*- coding: utf-8 -*-
import phylab
from math import sqrt

def VA_MR(R1,R2,R_o,U,I):
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
    return res

def MeasureGalvo(R0,R1,R2,U,delta_V):
    global ki
    global d
    global Rg
    global U_ki
    global U_d
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
    return res_Rg

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
    return res_fRx

def test(R0,R1,R2,U1,delta_V,Rs,U2):
    res1 = MeasureGalvo(R0,R1,R2,U1,delta_V)
    res2 = VA_HR(Rs,U2,delta_V)
    return res1 + " " + res2

ki = 0
d = 50
Rg = 0
U_ki = 0
U_d = 0
