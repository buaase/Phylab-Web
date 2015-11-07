__author__ = 'Lydia'
import math
#实验1091-迈克尔逊干涉
#delta即△，lambda即λ，ave即平均值
delta_d = []
#输入表格的前两行数据
d = [float(i) for i in input('请输入 di(mm)（5个数据之间以空格分割，换行结束）: ').split()]
d5 = [float(j) for j in input('请输入 di+5(mm)（5个数据之间以空格分割，换行结束）: ').split()]

for k in range(0,5,1):
    delta_d.append(d5[k] - d[k])
print(delta_d)#输出表格的第3行
ave_delta_d5 = sum(delta_d) / 5#5倍的delta_d的均值——答案1
ave_delta_d = ave_delta_d5 / 5#delta_d的均值——答案2

cal = []
for k in range(0,5,1):
    cal.append(pow(delta_d[k] - 5 * ave_delta_d,2))

calculate = sum(cal)
ua_ave_delta_d = math.sqrt(calculate / 5 / 4) / 5  #delta_dδ的均值的ua——答案3

ub_ave_delta_d = 0.00005 / math.sqrt(3)#delta_d的均值的ub——答案4

u_ave_delta_d = math.sqrt(pow(ua_ave_delta_d,2) + pow(ub_ave_delta_d,2))#delta_d的均值的u——答案5

N = 100
u_N = 1 / math.sqrt(3)


u_lambda_lambda = math.sqrt(pow(ua_ave_delta_d / ave_delta_d,2) + pow(u_N / N,2))#u(λ）/λ——答案6

Lambda = 2 * ave_delta_d / N#λ——答案7

u_lambda = u_lambda_lambda * Lambda # u(λ）——答案8

print(ave_delta_d5)
print(ave_delta_d)
print(ua_ave_delta_d)
print(ub_ave_delta_d)
print(u_ave_delta_d)
print(u_lambda_lambda)
print(Lambda)
print(u_lambda)
