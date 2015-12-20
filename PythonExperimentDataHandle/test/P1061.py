import phylab
from math import sqrt

def Average(exper):
    for i in range(3):
        aver = (exper[i][2] + exper[i][3]) / 2
        exper[i].append(aver)

def ObjectImageConvex(exper_1, exper_2, exper_3):
    u,v,f = [], [], []
    delta = 35.5
    for i in range(3) :
        if i == 0 :
            exper = exper_1
        elif i == 1 :
            exper = exper_2
        else :
            exper = exper_3
        Average(exper)
        temp_u = []
        temp_v = []
        temp_f = []
        sum_f = 0
        for j in range(3):
            x = abs(exper[j][4] - exper[j][0]) - delta
            temp_u.append(x)
            y = abs(exper[j][1]-exper[j][4])
            temp_v.append(y)
            z = x*y/(x+y)
            sum_f += z
            temp_f.append(z)
        temp_f.append(sum_f/3)
        u.append(temp_u)
        v.append(temp_v)
        f.append(temp_f)
    average_f = 0
    for i in range(3) :
        average_f += f[i][3]
    average_f /= 3

    return average_f

def ObjectImageConcave(exper):
    u,v,f = [],[],[]
    sum_f = 0
    for i in range(3):
        aver = (exper[i][1] + exper[i][2])/2
        exper[i].append(aver)
        temp_u = exper[i][0] - aver
        u.append(temp_u)
        temp_v = abs(exper[i][3] -aver)
        v.append(temp_v)
        temp_f = temp_u*temp_v/(temp_u+temp_v)
        sum_f += temp_f
        f.append(temp_f)
    average_f = sum_f/3

    return average_f

def CollimatedConvex(exper):
    f = []
    sum_f = 0
    delta = 35.5
    for i in range(5):
        aver = (exper[i][1] + exper[i][2])/2
        exper[i].append(aver)
        temp_f = exper[i][0] - aver - delta
        sum_f += temp_f
        f.append(temp_f)
    average_f = sum_f / 5
    ua_f = phylab.Ua(f,average_f,len(f))
    ub_f = 0.5/sqrt(3)
    uf = sqrt(pow(ua_f,2) + pow(ub_f,2))

    res = [average_f,uf]
    return res
