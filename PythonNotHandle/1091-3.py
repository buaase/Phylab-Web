__author__ = 'Lydia'
import math
#实验1091-劈尖干涉
#delta即△，lambda即λ，ave即平均值

L = [float(i) for i in input('请输入细丝位置到劈尖尖端的5次测量位置(5个数据之间以空格分割，换行结束) L(mm): ').split()]#输入细丝位置到劈尖尖端的位置L,测5次，第一个表格的第一行
ave_L = sum(L) / 5
print(ave_L)#输出L的平均值——答案1

cal = []
for k in range(0,5,1):
    cal.append(pow(L[k] - ave_L,2))

calculate = sum(cal)
ua_L = math.sqrt(calculate / (5 * 4))
ub_L = 0.005 / math.sqrt(3)
u_L = math.sqrt(pow(ua_L,2) + pow(ub_L,2))

print(ua_L)#ua(L)——答案2
print(ub_L)#ub(L)——答案3
print(u_L)#u(L)——答案4

l = [float(i) for i in input('请输入5个x(i)的值(mm)(5个数据之间以空格分割，换行结束): ').split()]#输入5个x(i)的值，第二个表格的第一行
l5 = [float(j) for j in input('请输入5个x(i+5)的值(mm)(5个数据之间以空格分割，换行结束): ').split()]#输入5个x(i+5)的值，第二个表格的第二行
delta_l = []
for k in range(0,5,1):
    delta_l.append(l5[k] - l[k])
print(delta_l)#第二个表格第3行——答案5
ave_l = sum(delta_l) / 5 / 25
print(ave_l)#l的平均值——答案6

cal2 = []
for k in range(0,5,1):
    cal2.append(pow(delta_l[k] / 25 - ave_l,2))
calculate2 = sum(cal2)
ua_l = math.sqrt(calculate2 / (5*4))
ub_l = ub_L
u_l = math.sqrt(pow(ua_l,2) + pow(ub_l,2))
Lambda = 0.0005893
d = ave_L * Lambda / (2 * ave_l)

print(ua_l)#ua(l)——答案7
print(ub_l)#ub(l)——答案8
print(u_l)#u(l)——答案9
print(Lambda)#λ——答案10
print(d)#d——答案11


ud = d * math.sqrt(pow(u_L / ave_L,2)+pow(u_l / ave_l,2))
print(ud)#u(d)——答案12