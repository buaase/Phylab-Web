__author__ = 'Lydia'
import math
#实验1091-牛顿环干涉
#delta即△，lambda即λ，ave即平均值
d = [float(i) for i in input('请输入x2(mm)(10个数据之间以空格分割，换行结束): ').split()]#输入表格第一行
d10 = [float(j) for j in input('请输入x1)(mm)(10个数据之间以空格分割，换行结束): ').split()]#输入表格第二行
k_value = eval(input("输入观察的起始k值:"))
x = []
x_squ = []
y = []
y_squ = []
xy = []
for k in range(0,10,1):
    x.append(k+k_value)
    y.append(pow(d10[k] - d[k],2))
    x_squ.append(pow(x[k],2))
    y_squ.append(pow(y[k],2))
    xy.append(x[k] * y[k])
print(y)#表格第4行D的平方（表格第三行可以省略）——答案1
ave_x_squ = sum(x_squ) / 10
ave_x = sum(x) / 10
ave_y_squ = sum(y_squ) / 10
ave_y = sum(y) / 10
ave_xy = sum(xy) / 10
ave_x_ave_y = ave_x * ave_y

print(ave_x_squ)#x平方的平均值——答案2
print(ave_x)#x的平均值——答案3
print(ave_y_squ)#y平方的平均值——答案4
print(ave_y)#y的平均值——答案5
print(ave_xy)#xy乘积的平均值——答案6
print(ave_x_ave_y)#x的平均值*y的平均值——答案7

r = (ave_xy - ave_x_ave_y) / (math.sqrt((ave_x_squ - pow(ave_x,2))*(ave_y_squ - pow(ave_y,2))))
b = (ave_x_ave_y - ave_xy) / (pow(ave_x,2) - ave_x_squ)
Lambda = 0.0005893
R = b / (4 * Lambda)

ua_b = math.sqrt((1 / pow(r,2) - 1) / 8) * b
ub_b = 0.005 / math.sqrt(3)
u_b = math.sqrt(pow(ua_b,2) + pow(ub_b,2))
u_R = u_b / 4 / Lambda

print(r)#相关系数——答案8
print(b)#b——答案9
print(R)#R——答案10
print(ua_b)#ua(b)——答案11
print(ub_b)#ub(b)——答案12
print(u_b)#u(b)——答案13
print(u_R)#u(R)——答案14