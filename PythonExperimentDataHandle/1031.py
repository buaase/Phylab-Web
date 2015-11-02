#!/usr/bin/env python
# -*- coding: utf-8 -*-
#Functions for experiment 1031
import math
#测量正弦波的电压与周期
def vandt(k,delta_y):
    #k为k值，delta_y为δy值
    upp=[]
    ue=[]
    for x in range(len(k)):
        upp.append(k[x]*delta_y[x])
    for x in range(len(k)):
        ue.append(upp[x]/(2*math.sqrt(2)))
    return upp,ue
    #upp ue值

#测量正弦信号频率
def avgfx(nx,ny,fy):
    sum=0
    fx=[]
    for x in range(len(fy)):
        fx.append(fy[x]*(float(ny[x])/float(nx[x])))
    print fx
    for x in fx:
        sum+=x
    af=sum/len(fx)
    sum=0
    for x in fx:
        sum+=(x-af)**2
    sum=math.sqrt(sum)
    ufx=sum/math.sqrt(len(fx)*(len(fx)-1))
    return fx,af,ufx
#fx为每个图形的频率，af为平均频率，ufx为不确定度

#振幅法测量声波波长和声速
def calv(envir_t,f1,f2,d):
    #envir_t为环境温度，f1为初始频率，f2为末频率，d为s1、s2间距（共20组）
    dx=[]
    sum=0
    for x in range(len(d)/2):
        dx.append(d[x+len(d)/2]-d[x])
        sum+=dx[x]
    ad=sum/10
    alab=2*ad/30
    af=(f1+f2)/2
    ct=331.45*math.sqrt(1+envir_t/273.15)
    c=alab*af
    #相对误差
    u1=(c-ct)/ct
    #a类误差
    uad=0
    #fx不确定度
    sum=0
    for x in range(10):
        sum+=(d[x]-ad)**2
    ud=math.sqrt(sum/10*9)
    ualab=2*ud/30
    #c不确定度合成
    ub_deltax=0.005/math.sqrt(3)
    ub1_lab=ub_deltax/15
    ub_f=abs(f1-f2)/math.sqrt(3)
    ub2_deltax=0.1/math.sqrt(3)
    ub2_lab=ub2_deltax/15
    #lamda不确定度
    u_lab=math.sqrt(ualab**2+ub1_lab**2+ub2_lab**2)
    #f不确定度
    uf=ub_f
    #c不确定度
    uc=c*math.sqrt((uf/af)**2+(u_lab/alab)**2)
    return c,uc
    #c为声速，uc为其不确定度
#test 1
#print vandt((0.5,0.5),(3.3,3.2))
#test 2
#print avgfx((2,2,2,4),(2,4,6,6),(497.55,248.78,165.85,331.70))
#test 3
#print calv(27.5,35.577,35.579,(2.692,7.706,12.687,17.801,22.577,27.696,32.472,37.707,42.662,47.682,150.362,155.011,160.073,164.885,169.927,174.629,179.843,184.160,189.164,194.026))