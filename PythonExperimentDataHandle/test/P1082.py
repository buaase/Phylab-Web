import phylab
from math import sqrt


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
    ua_bmin = sqrt(pow(ave_bi-(bmin[0]-bmin[1]),2)/2 + pow(ave_bi-(bmin[2]-bmin[3]),2)/2)
    ua_bmax = sqrt(pow(ave_ba-(bmax[0]-bmax[1]),2)/2 + pow(ave_ba-(bmax[2]-bmax[3]),2)/2)
    u_bmin = sqrt(pow(0.025*ave_bi/sqrt(3),2) + pow(0.005/sqrt(3),2) + pow(ua_bmin,2))
    u_bmax = sqrt(pow(0.025*ave_ba/sqrt(3),2) + pow(0.005/sqrt(3),2) + pow(ua_bmax,2))

    smin = abs(loc[0] - loc[4]) * 10
    smax = abs(loc[0] - loc[3]) * 10
    u_smin = sqrt(pow(0.5/sqrt(3),2) + pow(0.05/sqrt(3),2))
    u_smax = sqrt(pow(0.5/sqrt(3),2) + pow(0.05/sqrt(3),2))

    lbd = delta_x[len(delta_x)-1]*sqrt(ave_bi*ave_ba) / (smin + smax) * pow(10,6)
    temp = pow(u_x/delta_x[len(delta_x)-1],2)
    temp += pow(u_bmin/2/ave_bi,2)
    temp += pow(u_bmax/2/ave_ba,2)
    temp += pow(u_smin/10/(smin+smax),2)
    temp += pow(u_smax/10/(smin+smax),2)
    u_lbd = lbd*sqrt(temp)

    res = phylab.BitAdapt(lbd,u_lbd)
    return res

def LloydSodium(lx,bmin,bmax,loc):
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
    ua_bmin = sqrt(pow(ave_bi-(bmin[0]-bmin[1]),2)/2 + pow(ave_bi-(bmin[2]-bmin[3]),2)/2)
    ua_bmax = sqrt(pow(ave_ba-(bmax[0]-bmax[1]),2)/2 + pow(ave_ba-(bmax[2]-bmax[3]),2)/2)
    u_bmin = sqrt(pow(0.025*ave_bi/sqrt(3),2) + pow(0.005/sqrt(3),2) + pow(ua_bmin,2))
    u_bmax = sqrt(pow(0.025*ave_ba/sqrt(3),2) + pow(0.005/sqrt(3),2) + pow(ua_bmax,2))


    smin = abs(loc[0] - loc[4]) * 10
    smax = abs(loc[0] - loc[3]) * 10
    u_smin = sqrt(pow(0.5/sqrt(3),2) + pow(0.05/sqrt(3),2))
    u_smax = sqrt(pow(0.5/sqrt(3),2) + pow(0.05/sqrt(3),2))

    lbd = delta_x[len(delta_x)-1]*sqrt(ave_bi*ave_ba) / (smin + smax) * pow(10,6)
    temp = pow(u_x/delta_x[len(delta_x)-1],2)
    temp += pow(u_bmin/2/ave_bi,2)
    temp += pow(u_bmax/2/ave_ba,2)
    temp += pow(u_smin/10/(smin+smax),2)
    temp += pow(u_smax/10/(smin+smax),2)
    u_lbd = lbd*sqrt(temp)

    res = phylab.BitAdapt(lbd,u_lbd)
    return res
