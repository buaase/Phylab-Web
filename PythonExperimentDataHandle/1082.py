#!/usr/bin/env python
# -*- coding: utf-8 -*-
#Functions for experiment 1082
import math
#钠光双棱镜干涉
def cal_delta_x(x,b1,b2,l):
    #x为存放条纹位置的数组，容量为20
    #b1,b2分别存小像，大像的位置（左右各一个）
    #l存放仪器位置，分别为狭缝、B、l1（大像）、l2（小像）、E、delta

    #逐差法求delta_x
    sum=0
    for i in range(10):
        sum+=abs(x[i+10]-x[i])/10
    avg_delta_x=sum/10
    sum=0
    #计算不确定度
    for i in range(10):
        sum+=(abs(x[i+10]-x[i])/10-avg_delta_x)**2
    ua_delta_x=math.sqrt(sum/90)
    ub_delta_x=0.005/math.sqrt(3)
    u_delta_x=math.sqrt(ua_delta_x**2+ub_delta_x**2)
    #计算avg_b1,avg_b2,u_s1,u_s2,u_b1,u_b2
    avg_b1=abs((b1[0]+b1[2]-b1[1]-b1[3])/2)
    avg_b2=abs((b2[0]+b2[2]-b2[1]-b2[3])/2)
    delta_s1=delta_s2=0.5
    u_s1=0.29
    u_s2=0.29
    u_b1=math.sqrt(((0.025*avg_b1)**2+0.005**2)/3)
    u_b2=math.sqrt(((0.025*avg_b2)**2+0.005**2)/3)
    #计算波长lab及其不确定度u_lab
    s1=l[0]-l[2]-l[5]
    s2=l[0]-l[3]-l[5]
    lab=avg_delta_x*math.sqrt(avg_b1*avg_b2)/((s1+s2)*10)
    u_lab=lab*math.sqrt((u_delta_x/avg_delta_x)**2+(u_b1/(2*avg_b1))**2+(u_b2/(2*avg_b2))**2+(u_s1/(s1+s2))**2+(u_s2/(s1+s2))**2)
    #lab为波长，u_lab为lab的不确定度
    return lab,u_lab
#test
x=(7.632,7.351,7.039,6.709,6.408,6.132,5.851,5.542,5.271,4.970,4.671,4.359,4.075,3.885,3.511,3.218,2.912,2.620,2.335,2.101)
b1=(5.151,6.475,5.203,6.527)
b2=(3.314,7.141,3.330,7.157)
l=(142.5,123.77,114.58,75.56,57.60,4)
print cal_delta_x(x,b1,b2,l)