# -*- coding: utf-8 -*-
"""
Demo of the errorbar function.
"""
import numpy as np
import matplotlib
matplotlib.use('Agg')
import matplotlib.pyplot as plt
from scipy import integrate
import numpy
import math
import xml.dom.minidom
import os
import json
import sys
import subprocess
import traceback
from matplotlib.lines import Line2D
from jinja2 import Environment

CONST_Y_LOW = 25
CONST_Y_MIN = 5
CONST_Y_LIM = 180

env = Environment(line_statement_prefix="#", variable_start_string="||", variable_end_string="||")


def ToPoint(number):
    Tempstr = format(number,'.4g')
    return float(Tempstr)


def DrawPicture(name,envir_temp,down_straight_line_x_init,down_straight_line_y_init,down_bend_x_init,down_bend_y_init,up_straight_line_x_init,up_straight_line_y_init):
#绘制网格
    fig = plt.figure(figsize=(15,18))
    for i in np.arange(0,150,1):
        x = [i,i]
        y = [0,CONST_Y_LIM]
        plt.plot(x, y, color="0.75", linewidth=0.10, linestyle="-")

    for i in np.arange(0,150,5):
        x = [i,i]
        y = [0,CONST_Y_LIM]
        plt.plot(x, y, color="0.75", linewidth=0.25, linestyle="-")

    for i in np.arange(0,150,10):
        x = [i,i]
        y = [0,CONST_Y_LIM]
        plt.plot(x, y, color="0.75", linewidth=0.75, linestyle="-")


    for i in np.arange(0,CONST_Y_LIM,1):
        y = [i,i]
        x = [0,150]
        plt.plot(x, y, color="0.75", linewidth=0.10, linestyle="-")

    for i in np.arange(0,CONST_Y_LIM,5):
        y = [i,i]
        x = [0,150]
        plt.plot(x, y, color="0.75", linewidth=0.25, linestyle="-")

    for i in np.arange(0,CONST_Y_LIM,10):
        y = [i,i]
        x = [0,150]
        plt.plot(x, y, color="0.75", linewidth=0.75, linestyle="-")


    #plt.xticks(np.linspace(0,150,16,endpoint=True))
    #plt.yticks(np.linspace(0,180,19,endpoint=True))

    plt.xticks((0,10,20,30,40,50,60,70,80,90,100,110,120,130,140,150), 
        (0,1*60,2*60,3*60,4*60,5*60,6*60,7*60,8*60,9*60,10*60,11*60,12*60,13*60,14*60,15*60))

    plt.yticks((0,10,20,30,40,50,60,70,80,90,100,110,120,130,140,150,160,170,180),
        (5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41))

    #point
    #x=[0,60,120,180,240,260,275,290,305,320,335,350,365,380,395,410,425,440,455,470,485,500,515,530,590,650,710,770,830]
    #y=[27.9820,27.8272,27.7240,27.5950,27.4918,27.5176,23.3923,20.0442,17.8311,16.1595,14.9255,14.1032,13.5893,13.2039,12.7929,12.6131,12.4590,12.4076,12.3820,12.4076,12.4333,12.4333,12.4590,12.4847,12.5617,12.6645,12.7415,12.8186,12.8957]

    #源数据,注意由于x图上1个单位实际上是6个，而画图时是按照单位上的格子数来数的，这一点一定要注意
    #down_straight_line_x_init = [0,60,120,180,240,260]
    #down_straight_line_y_init = [27.9820,27.8272,27.7240,27.5950,27.4918,27.3176]
    down_straight_line_x = []
    down_straight_line_y = []
    for line_x in down_straight_line_x_init:
        down_straight_line_x.append(line_x/6)
    for line_y in down_straight_line_y_init:
        down_straight_line_y.append(line_y*CONST_Y_MIN-CONST_Y_LOW)

    #down_bend_x_init = [260,275,290,305,320,335,350,365,380,395,410,425,440,455,470,485,500,515,530]
    #down_bend_y_init = [27.3176,23.3923,20.0442,17.8311,16.1595,14.9255,14.1032,13.5893,13.2039,12.7929,12.6131,12.4590,12.4076,12.3820,12.4076,12.4333,12.4333,12.4590,12.4847]

    #要显示在图纸上的值
    down_bend_x = []
    down_bend_y = []

    #1个格子代表6个x单位，10个格子代表1个y单位
    for bend_x in down_bend_x_init:
        down_bend_x.append(bend_x/6)
    for bend_y in down_bend_y_init:
        down_bend_y.append(bend_y*CONST_Y_MIN-CONST_Y_LOW)

    #up_straight_line_x_init = [530,590,650,710,770,830]
    #up_straight_line_y_init = [12.4847,12.5617,12.6645,12.7415,12.8186,12.8957]

    up_straight_line_x = []
    up_straight_line_y = []

    for up_x in up_straight_line_x_init:
        up_straight_line_x.append(up_x/6)
    for up_y in up_straight_line_y_init:
        up_straight_line_y.append(up_y*CONST_Y_MIN-CONST_Y_LOW)

    #下降的直线模拟函数
    down_straight_line_base = numpy.polyfit(down_straight_line_x_init,down_straight_line_y_init,1)
    down_straight_line_func = numpy.poly1d(down_straight_line_base)
    down_straight_line_fit_y = map(lambda x:down_straight_line_func(x)*CONST_Y_MIN-CONST_Y_LOW,down_straight_line_x_init)

    #曲线拟合准确度
    down_cicyle = 2;
    down_bend_u = 0;
    down_bend_func = 0;

    #while down_bend_u <0.999:
    #    down_cicyle += 1
    
    down_bend_base = numpy.polyfit(down_bend_x_init,down_bend_y_init,5)
    down_bend_func = numpy.poly1d(down_bend_base)
    #    down_bend_yhat = down_bend_func(down_bend_x_init)
    #    down_bend_ybar = numpy.sum(down_bend_y_init)/len(down_bend_y_init)
    #    down_bend_reg = numpy.sum((down_bend_yhat-down_bend_ybar)**2)
    #    down_bend_tot = numpy.sum((down_bend_y_init-down_bend_ybar)**2)
    #    down_bend_u = down_bend_reg / down_bend_tot
    down_bend_y_fit = map(lambda x:down_bend_func(x)*CONST_Y_MIN-CONST_Y_LOW,down_bend_x_init)
    
    #上升直线的拟合函数
    up_straight_line_base = numpy.polyfit(up_straight_line_x_init,up_straight_line_y_init,1)
    up_straight_line_func = numpy.poly1d(up_straight_line_base)
    up_straight_line_fit_y = map(lambda x:up_straight_line_func(x)*CONST_Y_MIN-CONST_Y_LOW,up_straight_line_x_init)

    down_bend_fit_y = map(lambda x:down_bend_func(x)*10-110,down_bend_x_init)
    #下降直线的模拟绘图
    plt.plot(down_straight_line_x,down_straight_line_y,linestyle=' ',c="black",marker=Line2D.markers.get('x'),markersize=10)
    plt.plot(down_straight_line_x,down_straight_line_fit_y,linestyle='-',c="blue",linewidth=2)

    #下降曲线的模拟绘图
    plt.plot(down_bend_x,down_bend_y,linestyle=' ',c="black",marker=Line2D.markers.get('x'),markersize=10)
    plt.plot(down_bend_x,down_bend_y_fit,linestyle='-',c="blue",linewidth=2)

    #上升直线的模拟绘图
    plt.plot(up_straight_line_x,up_straight_line_y,linestyle=' ',c="black",marker=Line2D.markers.get('x'),markersize=10)
    plt.plot(up_straight_line_x,up_straight_line_fit_y,linestyle='-',c="blue",linewidth=2)

    #竖线的绘制区域

    #第一块面积，下降的竖线与曲线之间的面积
    vertical_line =  down_bend_x_init[0]
    #触发起始条件
    s1 = 0
    s2 = 1000
    #使用break是为了让程序可以从循环中退出
    while abs(s1-s2)>10:
        vertical_line += 1
        s1,aber1 = integrate.quad(lambda x:down_straight_line_func(x)-down_bend_func(x),down_bend_x_init[0],vertical_line)
        s2,aber2 = integrate.quad(lambda x:down_bend_func(x) - up_straight_line_func(x),vertical_line,down_bend_x_init[-1])
        #print vertical_line
	print down_straight_line_func(vertical_line)
	print "down_bend_func"
	print down_bend_func(120)
	#print down_bend_x_init[0]
	#print down_bend_x_init[-1]
	print s1,s2
	#print vertical_line
        if s1 > s2:
            break;

    not_exist_up_line_x_init = range(vertical_line,up_straight_line_x_init[0])
    not_exist_up_line_x = []
    for x in not_exist_up_line_x_init:
        not_exist_up_line_x.append(x/6)
    not_exist_up_line_y = map(lambda x:up_straight_line_func(x)*CONST_Y_MIN-CONST_Y_LOW,not_exist_up_line_x_init)

    not_exist_down_line_x_init = range(down_bend_x_init[0],vertical_line)
    not_exist_down_line_x = []
    for x in not_exist_down_line_x_init:
        not_exist_down_line_x.append(x/6)
    not_exist_down_line_y = map(lambda x:down_straight_line_func(x)*CONST_Y_MIN-CONST_Y_LOW,not_exist_down_line_x_init)

    #绘制两条虚线
    plt.plot(not_exist_up_line_x,not_exist_up_line_y,linestyle='--',c="blue",linewidth=2)
    plt.plot(not_exist_down_line_x,not_exist_down_line_y,linestyle='--',c="blue",linewidth=2)

    plt.plot([0,150],[envir_temp,envir_temp],linestyle='--',c="green",linewidth=2)

    vertical_line_x= [vertical_line/6,vertical_line/6]
    vertical_line_y =[0,CONST_Y_LIM-CONST_Y_LOW]

    plt.plot(vertical_line_x,vertical_line_y,linestyle='--',c="black",linewidth=1)
    
    fig.savefig(name+'.png')
    return vertical_line

def ReadXml10211(sublab_root,name):
    file_object = open("/opt/lampp/htdocs/Phylab-Web/SE_PhysExpeRepo/storage/app/script/Handle10211.tex","r")
    #file_object = open("Handle10211.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')
    down_straight_line_R = []
    down_straight_line_x_init=[]
    down_straight_line_y_init=[]
    down_bend_R = []
    down_bend_x_init=[]
    down_bend_y_init=[]
    up_straight_line_R = []
    up_straight_line_x_init=[]
    up_straight_line_y_init=[]
    #scale是指筒的质量
    scale = []
    sublab_table_list = sublab_root.getElementsByTagName("table")
    #第一个结点是质量集合
    for td in sublab_table_list[0].getElementsByTagName("td"):
        scale.append(float(td.firstChild.nodeValue))
    #index用于计算x的大小
    #print scale
    x_index = 0;
    for tr in sublab_table_list[1].getElementsByTagName("tr"):
        tr_td_list = tr.getElementsByTagName("td")
        if tr_td_list[0].firstChild:
            y_value =tr_td_list[0].firstChild.nodeValue
            down_straight_line_x_init.append(x_index)
            #这里假设数据单位是kΩ
            down_straight_line_y_init.append(ToPoint(float(RToTemperature(y_value))))
            down_straight_line_R.append(y_value)
            x_index += 60

    #print down_straight_line_y_init
    down_bend_x_init.append(down_straight_line_x_init[-1])
    down_bend_y_init.append(down_straight_line_y_init[-1])

    for tr in sublab_table_list[1].getElementsByTagName("tr"):
        tr_td_list = tr.getElementsByTagName("td")
        if tr_td_list[1].firstChild:
            y_value =tr_td_list[1].firstChild.nodeValue
            down_bend_x_init.append(x_index)
            #这里假设数据单位是kΩ
            down_bend_y_init.append(ToPoint(float(RToTemperature(y_value))))
            down_bend_R.append(y_value)
            x_index += 15

    #print down_bend_y_init
    up_straight_line_x_init.append(down_bend_x_init[-1])
    up_straight_line_y_init.append(down_bend_y_init[-1])
    
    for tr in sublab_table_list[1].getElementsByTagName("tr"):
        tr_td_list = tr.getElementsByTagName("td")
        if tr_td_list[2].firstChild:
            y_value =tr_td_list[2].firstChild.nodeValue
            up_straight_line_x_init.append(x_index)
            #这里假设数据单位是kΩ
            up_straight_line_y_init.append(ToPoint(float(RToTemperature(y_value))))
            up_straight_line_R.append(y_value)
            x_index += 60

    envir_temp = RToTemperature(scale[3])

    #后面的实验中要使用的前提数据
    vertical_line = DrawPicture(name,envir_temp,down_straight_line_x_init, down_straight_line_y_init, down_bend_x_init, down_bend_y_init, up_straight_line_x_init, up_straight_line_y_init)
    print down_straight_line_x_init
    print down_straight_line_y_init
    print down_bend_x_init
    print down_bend_y_init
    print up_straight_line_x_init
    print up_straight_line_y_init
    result = env.from_string(source).render(
        figurename = name,
	    vertical = vertical_line,
        down_straight_line_x = down_straight_line_x_init,
        down_straight_line_y = down_straight_line_y_init,
        down_straight_line_R = down_straight_line_R,
        down_bend_R = down_bend_R,
        down_bend_y = down_bend_y_init,
        down_bend_x = down_bend_x_init,
        up_straight_line_x = up_straight_line_x_init,
        up_straight_line_y = up_straight_line_y_init,
        up_straight_line_R = up_straight_line_R
        )

    return result


#input:电阻，阻值以kΩ为单位，返回值为温度，单位为摄氏度
def RToTemperature(R):
    A = 0.00390802
    B = -5.80195/(10**7)
    #print R
    T = (-A+math.sqrt(A**2+4*B*(float(R)-1)))/(2*B)
    return T

def ReadXmlTop(name):
    latex_head_file = open('/opt/lampp/htdocs/Phylab-Web/SE_PhysExpeRepo/storage/app/script/Head.tex','r')
    latex_head = latex_head_file.read().decode('utf-8', 'ignore')
    latex_tail = "\n\\end{document}"
    latex_body = ""

    dom = xml.dom.minidom.parse(sys.argv[1]+".xml")
    #获取根结点
    root = dom.documentElement
    #获取sub_list结点数组
    #1021有两个子实验结点
    sublab_list = root.getElementsByTagName('sublab')
    for sublab in sublab_list:
        sublab_status = sublab.getAttribute("status")
        sublab_id = sublab.getAttribute("id")
        #获取sublab的id
        if (sublab_status == 'true' )& (sublab_id == '10211'):
            #使用sys.argv[2]即要生成的文件名字来作为要生成的图片的名字
            latex_body += ReadXml10211(sublab,name)
        #elif (sublab_status == 'true')& (sublab_id == '10212'):
        #    latex_body +="\n"+ReadXml10612(sublab)

    return latex_head+latex_body+latex_tail

if __name__ == '__main__':
    try:
        finish_str = ReadXmlTop(sys.argv[2])
        finish_file = open(sys.argv[2]+".tex","w")
        finish_file.write(finish_str.encode('utf-8', 'ignore'))
        finish_file.close()
        #等于１时是错误
        ret =  subprocess.call("pdflatex -interaction=nonstopmode "+sys.argv[2]+".tex",shell=True)
        subprocess.call("rm "+sys.argv[2]+".aux",shell=True)
        subprocess.call("rm "+sys.argv[2]+".synctex*",shell=True)
        subprocess.call("rm "+sys.argv[2]+".log",shell=True)
        if ret==0:
            print('{"status":"success"}')
        else:
            print('{"status":"fail"}')
    except Exception as e:
        #print(traceback.format_exc())
        print('{"status":"fail"}')
