# -*- coding: utf-8 -*-

from math import sqrt

#将二维列表x中的每一个值保留b位小数（带四舍五入）
def RoundTwo(x,b):
    for i in range(len(x)):
        for j in range(len(x[i])):
            x[i][j] = round(x[i][j],b)
            if b == 0:
                x[i][j] = ("%d" %x[i][j])
            elif b == 1:
                x[i][j] = ("%.1f" %x[i][j])
            elif b == 2:
                x[i][j] = ("%.2f" %x[i][j])
            elif b == 3:
                x[i][j] = ("%.3f" %x[i][j])
            elif b == 4:
                x[i][j] = ("%.4f" %x[i][j])
            elif b == 5:
                x[i][j] = ("%.5f" %x[i][j])
            elif b == 6:
                x[i][j] = ("%.6f" %x[i][j])

#将一维列表x中的每一个值保留b位小数（带四舍五入）
def RoundOne(x,b):
    for i in range(len(x)):
        x[i] = round(x[i],b)
        if b == 0:
            x[i] = ("%d" %x[i])
        elif b == 1:
            x[i] = ("%.1f" %x[i])
        elif b == 2:
            x[i] = ("%.2f" %x[i])
        elif b == 3:
            x[i] = ("%.3f" %x[i])
        elif b == 4:
            x[i] = ("%.4f" %x[i])
        elif b == 5:
            x[i] = ("%.5f" %x[i])
        elif b == 6:
            x[i] = ("%.6f" %x[i])

#计算a类不确定度：x是一个列表，aver是x的平均值，k是数据的组数（不一定等于len(x)，
#               因为x后面可能添加了x的平均值）
def Ua(x, aver, k) :
    sumx = 0
    for i in range(k):
        sumx += (x[i] - aver)**2
    return sqrt(sumx/(k*(k-1)))

#匹配最终结果：(f+u_f)
#输入算出来的最终结果和它的不确定度，可以返回最终结果的形式
def BitAdapt(x,u_x) :
    ten = 0
    ften = 0
    if (u_x >= 10):
        temp = x
        while(temp >= 10):
            temp = temp/10
            ten += 1
        x = float(x)/10**ten
        u_x = float(u_x)/10**ten
    elif (x < 0.001):
        temp = x
        ften = 0
        while(temp < 1):
            temp = temp*10
            ften += 1
        x = float(x) * 10**ften
        u_x = float(u_x) * 10**ften
    Tempbit = 0
    bit = 0
    while (1):
        i = 0
        while(1):
            temp = float(u_x)*(10**i)
            if(temp >= 1):
                bit = i
                break
            else :
                i+=1
        u_x = round(float(u_x),bit)
        x = round(float(x),bit)
        if bit == 0:
            u_x = ("%d" % u_x)
            x = ("%d" % x)
        elif bit == 1:
            u_x = ("%.1f" % u_x)
            x = ("%.1f" % x)
        elif bit == 2:
            u_x = ("%.2f" % u_x)
            x = ("%.2f" % x)
        elif bit == 3:
            u_x = ("%.3f" % u_x)
            x = ("%.3f" % x)
        elif bit == 4:
            u_x = ("%.4f" % u_x)
            x = ("%.4f" % x)
        elif bit == 5:
            u_x = ("%.5f" % u_x)
            x = ("%.5f" % x)
        elif bit == 6:
            u_x = ("%.6f" % u_x)
            x = ("%.6f" % x)
        elif bit == 7:
            u_x = ("%.7f" % u_x)
            x = ("%.7f" % x)
        elif bit == 8:
            u_x = ("%.8f" % u_x)
            x = ("%.8f" % x)
        i = 0
        while(1):
            temp = float(u_x)*(10**i)
            if(temp >= 1):
                Tempbit = i
                break
            else :
                i+=1
        if Tempbit == bit:
            break
    if ten > 0:
        x = "(" + str(x) + "\\pm"
        u_x = str(u_x) + "){\\times}10^{" + str(ten) + "}"
    elif ften > 0:
        x = "(" + str(x) + "\\pm"
        u_x = str(u_x) + "){\\times}10^{-" + str(ften) + "}"
    else:
        x = "(" + str(x) + "\\pm"
        u_x = str(u_x) + ")" 
    return x + u_x

#转换为科学计数法表示
def ToScience(number):
    Tempstr = format(number,'.4g')
    #如果发现Tempstr中含有e的话，说明是科学计数法
    if 'e' in  Tempstr:
        index_str = Tempstr.split('e')
        if index_str[0] == '1':
            return '10^{'+str(int(index_str[1]))+'}'
        else:
            return index_str[0]+'{\\times}10^{'+str(int(index_str[1]))+'}'
    else:
        return Tempstr

#对于x和y两个一维列表进行一元线性处理：y = a + bx
#返回列表[b,r]
def ULR(x,y):
    size = len(x)-1
    x_2 = []
    y_2 = []
    xy = []
    for i in range(size):
        x_2.append(x[i]**2)
        y_2.append(y[i]**2)
        xy.append(x[i] * y[i])
    x_2.append(sum(x_2)/size)
    y_2.append(sum(y_2)/size)
    xy.append(sum(xy)/size)

    b = (x[size]*y[size]-xy[size])/(pow(x[size],2)-x_2[size])
    r = (xy[size] - x[size]*y[size]) / sqrt((x_2[size] - pow(x[size],2))*(y_2[size]-pow(y[size],2)))
    res = [b,r]
    return res

#求仪器误差限
def DELTA_R(R):
    res = 0.02 + R%1*5/100.0
    R = R - R%1
    res = res + R%10*5/1000.0
    R = R - R%10
    res = res + R%100*2/1000.0
    R = R - R%100
    res = res + R/1000.0
    return res

#逐差法求
def DWM(x):
    res = []
    size = len(x)/2
    for i in range(size):
        temp = abs(x[i]-x[i+size])
        res.append(temp)
    return res

#测试时的误差要求，误差范围内就返回1，否则就返回0
def Mistake(x,y):
    x = abs(x)
    y = abs(y)
    r1 = x+x/100
    r2 = x-x/100
    if (y > r1) | (y <r2):
        return 0
    else:
        return 1
