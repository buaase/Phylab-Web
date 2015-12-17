# -*- coding: utf-8 -*-
#-------10821 双棱镜测钠光波长--------------------------------
'''
input:
    lx[] 条纹位置 单位mm
    bmin[] 小像的左右位置(左1，右1，左2，右2) 单位mm
    bmax[] 大像的左右位置(左1，右1，左2，右2) 单位mm
    loc[] 仪器位置(狭缝，目镜，双棱镜，L大，L小) 单位cm
output:
    lx[] bmin[] bmax[] loc[]  其中bmin和bmax添加了平均值
    tenx[] 10倍delta_x 单位mm
    delta_x[] 单倍条纹间距和它的平均值 单位mm
    ua_x x的A类不确定度 单位mm
    ub_x x的B类不确定度 单位mm
    u_x x的不确定度 单位mm

    u_bmin,u_bmax 单位mm

    smin,smax 狭缝与大小像的距离 单位cm
    u_smin,u_smax 单位mm

    lbd 波长 单位nm
    u_lbd 不确定度 单位nm
'''
#标准函数处理文件
import phylab
#from jinja2 import Template
#from jinja2 import Environment
from math import sqrt

#env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

def BiprismSodium(lx,bmin,bmax,loc):
    tenx = phylab.DWM(lx)
    delta_x = []
    for a in tenx:
        delta_x.append(a/10.0)
    delta_x.append(sum(delta_x)/len(delta_x))
    ua_x = phylab.Ua(delta_x, delta_x[len(delta_x)-1], len(delta_x)-1)
    ub_x = 0.005/sqrt(3)
    u_x = sqrt(ub_x**2 + ua_x**2)

    ave_bi = abs(bmin[0]-bmin[1]+bmin[2]-bmin[3]) / 2
    bmin.append(ave_bi)
    ave_ba = abs(bmax[0]-bmax[1]+bmax[2]-bmax[3]) / 2
    bmax.append(ave_ba)
    u_bmin = sqrt(pow(0.025*ave_bi/sqrt(3),2) + pow(0.005/sqrt(3),2))
    u_bmax = sqrt(pow(0.025*ave_ba/sqrt(3),2) + pow(0.005/sqrt(3),2))

    smin = abs(loc[0] - loc[4])
    smax = abs(loc[0] - loc[3])
    u_smin = 2.8
    u_smax = 2.8

    lbd = delta_x[len(delta_x)-1]*sqrt(ave_bi*ave_ba) / (smin + smax) * pow(10,5)
    temp = pow(u_x/delta_x[len(delta_x)-1],2)
    temp += pow(u_bmin/2/ave_bi,2)
    temp += pow(u_bmax/2/ave_ba,2)
    temp += pow(u_smin/10/(smin+smax),2)
    temp += pow(u_smax/10/(smin+smax),2)
    u_lbd = lbd*sqrt(temp)

    res = phylab.BitAdapt(lbd,u_lbd)
    print "res: " + str(res)
    phylab.RoundOne(lx,3)
    print "lx: " + str(lx)
    phylab.RoundOne(tenx,3)
    print "tenx: " + str(tenx)
    phylab.RoundOne(delta_x,4)
    print "delta_x: " + str(delta_x)
    ua_x = round(ua_x,5)
    print "ua_x: " + str(ua_x)
    ub_x = round(ub_x,5)
    print "ub_x: " + str(ub_x)
    u_x = round(u_x,5)
    print "u_x: " + str(u_x)
    phylab.RoundOne(bmin,3)
    print "bmin: " + str(bmin)
    phylab.RoundOne(bmax,3)
    print "bmax: " + str(bmax)
    u_bmin = round(u_bmin,4)
    print "u_bmin: " + str(u_bmin)
    u_bmax = round(u_bmax,4)
    print "u_bmax: " + str(u_bmax)
    phylab.RoundOne(loc,1)
    print "loc: " + str(loc)
    smin = round(smin,1)
    print "smin: " + str(smin)
    smax = round(smax,1)
    print "smax: " + str(smax)
    u_smin = round(u_smin,1)
    print "u_smin: " + str(u_smin)
    u_smax = round(u_smax,1)
    print "u_smax: " + str(u_smax)
    lbd = round(lbd,3)
    print "lbd: " + str(lbd)
    u_lbd = round(u_lbd,3)
    print "u_lbd: " + str(u_lbd)
lx = [8.172,7.853,7.538,7.176,6.831,6.508,6.198,5.891,5.464,5.147,
        4.848,4.559,4.275,3.902,3.563,3.255,2.971,2.615,2.310,1.995]
bmin = [6.001,5.222,5.925,5.171]
bmax = [6.757,2.710,6.678,2.628]
loc = [144.0,52.0,128.0,113.8,77.9]
BiprismSodium(lx,bmin,bmax,loc)
'''
    result = env.from_string(source).render(
        R_res = res,
        R_lx = lx,
        R_tenx = tenx,
        R_delta_x = delta_x,
        R_ua_x = ua_x,
        R_ub_x = ub_x,
        R_u_x = u_x,
        R_bmin = bmin,
        R_bmax = bmax,
        R_u_bmin = u_bmin,
        R_u_bmax = u_bmax,
        R_loc = loc,
        R_smin = smin,
        R_smax = smax,
        R_u_smin = u_smin,
        R_u_smax = u_smax,
        R_lbd = lbd,
        R_u_lbd = u_lbd 
        )
    return result 

def ReadXmlBiprismSodium():
    #载入数据处理模板
    file_object = open("Handle10821.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')
    
    source = BiprismSodium(source)

    return source

if __name__ == '__main__':
    nstr = ReadXmlBiprismSodium()
    nfile = open('Handle10821finish.tex','w')
    nfile.write(nstr.encode('utf-8', 'ignore'));
    nfile.close();
'''
