# -*- coding: utf-8 -*-
#-------10421 双电桥测低电阻--------------------------------
'''
input:
    R1,R2 空值电阻 单位Ω
    RN 精确低电阻 单位Ω
    LR[[]] 正向反向测得不同长度的电阻[长度(mm)，正向(Ω)，反向(Ω)]
    d[] 铜丝直径 单位mm
output:
    R1,R2,RN,LR(添加了正反向均值列表),d(添加了均值元素)
    t RN/R1
    b,r 一元线性回归处理
    XY[[]] 一元线性回归处理的表格[x,x2,y,y2,xy]
    P 铜丝的电阻率 单位Ω.mm
    fP 铜丝的最终电阻率 单位Ω.m
    ua_bb b的A类不确定度除以b
    ua_d d的不确定度  单位mm
    uP P的不确定度除以P
    u_P P的不确定度 单位Ω.m
    res_P P的最终结果描述  单位Ω.m
'''
#标准函数处理文件
import phylab
#from jinja2 import Template
#from jinja2 import Environment
from math import sqrt
from math import pi

#env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

def DoubleBridge(R1,R2,RN,LR,d):
    temp = []
    for i in range(len(LR[0])):
        ave = (LR[1][i] + LR[2][i])/2
        temp.append(ave)
    LR.append(temp)
    ave_d = sum(d)/len(d)
    d.append(ave_d)

    t = RN/R1
    x = []
    x2 = []
    y = []
    y2 = []
    xy = []
    for i in range(len(LR[0])):
        x.append(LR[3][i])
        x2.append(LR[3][i]**2)
        y.append(LR[0][i])
        y2.append(LR[0][i]**2)
        xy.append(LR[0][i]*LR[3][i])
    x.append(sum(x)/len(x))
    x2.append(sum(x2)/len(x2))
    y.append(sum(y)/len(y))
    y2.append(sum(y2)/len(y2))
    xy.append(sum(xy)/len(xy))
    res = phylab.ULR(x,y)
    b = res[0]/t
    r = res[1]

    P = pi*pow(ave_d,2)/4/b
    fP = P/pow(10,3)

    ua_bb = sqrt((1/pow(r,2)-1) / (len(x)-3))
    ua_d = phylab.Ua(d,ave_d,len(d)-1)
    uP = sqrt(pow(2*ua_d/ave_d,2) + pow(ua_bb,2))
    u_P = uP * fP
    res = [fP,u_P]
    return res

'''
    res_P = phylab.BitAdapt(fP,u_P)
    print "res_P:" + str(res_P)
    R1 = ("%d" %R1)
    print "R1:" + str(R1)
    R2 = ("%d" %R2)
    print "R2:" + str(R2)
    RN = round(RN,3)
    print "RN:" + str(RN)
    phylab.RoundOne(LR[0],0)
    phylab.RoundOne(LR[1],2)
    phylab.RoundOne(LR[2],2)
    phylab.RoundOne(LR[3],2)
    print "LR:" + str(LR)
    phylab.RoundOne(d,2)
    print "d:" + str(d)
    t = phylab.ToScience(t)
    print "t:" + str(t)
    phylab.RoundOne(x,2)
    phylab.RoundOne(x2,2)
    phylab.RoundOne(xy,2)
    XY = [x,x2,y,y2,xy]
    print "XY:" + str(XY)
    b = round(b,4)
    print "b:" + str(b)
    r = round(r,5)
    print "r:" + str(r)
    P = phylab.ToScience(P)
    print "P:" + str(P)
    fP = phylab.ToScience(fP)
    print "fP:" + str(fP)
    ua_bb = round(ua_bb,5)
    print "ua_bb:" + str(ua_bb)
    ua_d = round(ua_d,5)
    print "ua_d:" + str(ua_d)
    uP = round(uP,5)
    print "uP:" + str(uP)
    u_P = phylab.ToScience(u_P)
    print "u_P:" + str(u_P)

R1 = 100
R2 = 100
RN = pow(10,-3)
LR = [[50,100,150,200,250,300,350,400],
        [29.39,59.40,88.46,117.76,148.47,177.24,206.92,236.44],
        [30.23,61.13,91.65,121.43,151.36,182.31,211.24,240.45]]
d = [4.06,4.04,4.01,3.98,3.98,4.03,4.01,4.03]
DoubleBridge(R1,R2,RN,LR,d)
'''
'''
    result = env.from_string(source).render(
        R_res_P = res_P,
        R_R1 = R1,
        R_R2 = R2,
        R_RN = RN,
        R_LR = LR,
        R_d = d,
        R_t = t,
        R_XY = XY,
        R_b = b,
        R_r = r,
        R_P = P,
        R_fP = fP,
        R_ua_bb = ua_bb,
        R_ua_d = ua_d,
        R_uP = uP,
        R_u_P = u_P
        )
    return result 

def ReadXmlDoubleBridge():
    #载入数据处理模板
    file_object = open("Handle10421.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')
    
    source = DoubleBridge(source)

    return source

if __name__ == '__main__':
    nstr = ReadXmlDoubleBridge()
    nfile = open('Handle10421finish.tex','w')
    nfile.write(nstr.encode('utf-8', 'ignore'));
    nfile.close();
'''
