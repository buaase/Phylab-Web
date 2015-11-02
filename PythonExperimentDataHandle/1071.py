# -*- coding: cp936 -*-
#---------------1071-------------------------------------------
#-----三棱镜顶角的测量--------------------------------------
'''
input:
    angle_a1 = []    angle_a2 = []
    angle_b1 = []    angle_b2 = []
output:
    angle_theta = []    angle_A = []
    uaA ubA uA      average_A
    uncertainty
'''

from math import sqrt
'''from numpy import sin
from numpy import cos
from numpy import pi'''

#分度转角度
def Angle(angle):
    angle = int(angle) + (angle-int(angle))*100/60
    return angle

#度转弧度
def change(x):
    x = x/180*pi
    return x

#角度的值的变换
def ChangeAngle(angle,n):
    angle = abs(angle)
    if angle > 200 :
        return 360 - angle
    return angle

#计算a类不确定度
def Ua(x, aver, k) :
    sumx = 0
    for i in range(k):
        sumx += (x[i] - aver)**2
    return sqrt(sumx/(k*(k-1)))

def VertAngle(angle_a1, angle_a2, angle_b1, angle_b2):
    precision = 1.0/60  #精度，此处默认为1'
    sum_A = 0
    k = len(angle_a1)
    angle_A = []
    angle_theta = []
    for i in range(k):
        temp1 = Angle(angle_a2[i]) - Angle(angle_a1[i])
        temp1 = ChangeAngle(temp1,200)
        temp2 = Angle(angle_b2[i]) - Angle(angle_b1[i])
        temp2 = ChangeAngle(temp2,200)
        temp = (temp1 + temp2) / 2
        angle_theta.append(temp)
        angle_A.append(temp / 2)
        sum_A += temp/2
    average_A = sum_A / k
    ua_theta = Ua(angle_A, average_A, k)
    ub_theta =precision / sqrt(3)
    u_theta = sqrt(pow(ua_theta,2) + pow(ub_theta,2))
    uA = u_theta/2
    re_u= uA / average_A #相对不确定度
#------------------------------------------------------------
#test
'''
a = [82.55,120,158.38,43.55,45.57]
b = [323,0.11,38.46,284,287]
c = [262.54,300,338.39,223.55,225.57]
d = [142.56,180.04,218.45,104,106]
VertAngle(a,b,c,d)
'''
#-----棱镜折射率的测量--------------------------------------
'''
input:
    angle_a1 = []    angle_a2 = []
    angle_b1 = []    angle_b2 = []
    average_A
output:
    angle_min = []   
    ua_min ub_min u_min      average_min
    n1  u_n1    uncertainty
'''

def Refract(angle_a1, angle_a2, angle_b1, angle_b2, average_A, uA) :
    precision = 1.0/60  #精度，此处默认为1'
    angle_min = []
    sum_min = 0
    k = len(angle_a1)
    for i in range(k) :
        temp1 = Angle(angle_a2[i]) - Angle(angle_a1[i])
        temp1 = ChangeAngle(temp1,100)
        temp2 = Angle(angle_b2[i]) - Angle(angle_b1[i])
        temp2 = ChangeAngle(temp2,100)
        temp = (temp1 + temp2) / 2
        angle_min.append(temp)
        sum_min += temp
    average_min = sum_min / k
    n1 = sin(change( (average_min+average_A) / 2 )) / sin(change(average_A / 2))
    ua_min = Ua(angle_min, average_min, k)
    ua_min = change(ua_min)
    ub_min = precision/sqrt(3)
    ub_min = change(ub_min)
    u_min = sqrt(pow(ua_min,2) + pow(ub_min,2))
    temp1 = cos(change((average_min + average_A)/2)) * u_min / 2 / sin(change(average_A/2))
    temp2 = sin(change(average_min/2))*change(ua)/2/pow(sin(change(average_A/2)),2)
    u_n1 = sqrt(pow(temp1,2)+pow(temp2,2))
    re_u = u_n1/n1 #相对不确定度
    print re_u
#----------------------------------------------------------------------
#test
'''
a1 = [67.06,347.37,39.35,259.04,307.03]
b1 = [247.04,167.38,219.34,79.04,127.05]
a2 = [16.18,38.3,90.2,309.56,357.58]
b2 = [196.15,218.31,270.22,129.55,177.55]
A = 59.90667
ua = 0.046059
Refract(a1,a2,b1,b2,A,ua)
'''

    
