__author__ = 'Lydia'
import math
#实验1011-扭摆法测转动惯量
#delta即△，lambda即λ，ave即平均值

m1 = eval(input("请输入圆柱的质量m1(g)："))#圆柱质量
d1 = eval(input("请输入直径d1(mm)："))#的直径大小

T0 = [float(i) for i in input('请输入 金属载物盘来往5次的时间T0(i)(s)（5个数据之间以空格分割，换行结束）: ').split()]
T1 = [float(j) for j in input('请输入 塑料圆柱来往5次的时间T1(i)(s)（5个数据之间以空格分割，换行结束）: ').split()]

ave_T0 = sum(T0) / 25
ave_T1 = sum(T1) / 25

print(ave_T0)
print(ave_T1)

I1 = m1 * pow(d1,2) * pow(10,-9) / 8#I1塑料圆柱的转动惯量
K = 4 * pow(math.pi,2) * I1 / (pow(ave_T1,2) - pow(ave_T0,2))
I0 = pow(ave_T0,2) * K / 4 / pow(math.pi,2)#I0圆盘的转动惯量

print(K)
print(I0)
print(I1)

m2,d2_in,d2_out = eval(input("请输入金属圆筒的质量m2(g) 内径d2_in(mm) 外径d2_out(mm)（3个数据之间以逗号分割，换行结束）："))
m3,d3 = eval(input("请输入塑料圆球的质量m3(g) 直径d3(mm)（2个数据之间以逗号分割，换行结束）："))
m4,l4 = eval(input("请输入金属细杆的质量m4(g) 金属细杆l4(mm)（2个数据之间以逗号分割，换行结束）："))

T2 = [float(i) for i in input('请输入 金属圆筒来往5次的时间T2(i)(s)（5个数据之间以空格分割，换行结束）: ').split()]
T3 = [float(j) for j in input('请输入 塑料球来往5次的时间T3(i)(s)（5个数据之间以空格分割，换行结束）: ').split()]
T4 = [float(k) for k in input('请输入 金属杆来往5次的时间T4(i)(s)（5个数据之间以空格分割，换行结束）: ').split()]

ave_T2 = sum(T2) / 25
ave_T3 = sum(T3) / 25
ave_T4 = sum(T4) / 25

print(ave_T2)
print(ave_T3)
print(ave_T4)

I2 = pow(ave_T2,2) * K / (4 * pow(math.pi,2)) - I0#金属圆筒转动惯量
I3 = pow(ave_T3,2) * K / (4 * pow(math.pi,2))#塑料球转动惯量
I4 = pow(ave_T4,2) * K / (4 * pow(math.pi,2))#细杆转动惯量

print(I2)
print(I3)
print(I4)

#理论值计算
I2_th = m2 * (pow(d2_in,2) + pow(d2_out,2)) * pow(10,-9) / 8
I3_th = m3 * pow(d3,2) * pow(10,-9) / 10
I4_th = m4 * pow(l4,2) * pow(10,-9) / 12

print(I2_th)
print(I3_th)
print(I4_th)

#测量值与理论值的百分差
delta_I2 = abs(I2 - I2_th) / I2_th
delta_I3 = abs(I3 - I3_th) / I3_th
delta_I4 = abs(I4 - I4_th) / I4_th

print("%.2f%%"%(delta_I2*100))
print("%.2f%%"%(delta_I3*100))
print("%.2f%%"%(delta_I4*100))

#验证平行轴定理
m5,l5,d5_in,d5_out = eval(input("请输入金属滑块的质量m5(g) 长度l5(mm) 外径d5_in(mm) 内径d5_out(mm)（4个数据之间以空格分割，换行结束）："))
r_left = [float(i) for i in input('请输入 滑块的左距离left(i)(cm)（9个数据之间以空格分割，换行结束）: ').split()]
r_right = [float(j) for j in input('请输入 滑块的右距离right(i)(cm)（9个数据之间以空格分割，换行结束）: ').split()]
T5 = [float(k) for k in input('请输入 来往5次的时间T0(i)(s)（3个数据之间以空格分割，换行结束）: ').split()]

for i in range(0,9,1):
    T5[i] = T5[i] / 5
r_squ = []
I5 = []
r_pow4 = []
I5_squ = []
xy = []

for i in range(0,9,1):
    r_squ.append(pow(r_left[i],2) + pow(r_right[i],2))
    I5.append(pow(T5[i],2) * K / 4 / pow(math.pi,2)- I4)
    r_pow4.append(pow(r_squ[i],2))
    I5_squ.append(pow(I5[i],2))
    xy.append(r_squ[i] * I5[i])

print(r_squ)
print(I5)
#一元线性回归：I5[i] = a + br_pow; x = r_pow,y = I5
ave_x = sum(r_squ) / 9
ave_x_squ = sum(r_pow4) / 9
ave_y = sum(I5) / 9
ave_y_squ = sum(I5_squ) / 9
ave_xy = sum(xy) / 9
ave_x_ave_y = ave_x * ave_y
#r接近1满足线性关系，系数b约等于滑块的质量则平行轴定理（I = Ic + mr^2）得证
r = (ave_xy - ave_x_ave_y) / (math.sqrt((ave_x_squ - pow(ave_x,2))*(ave_y_squ - pow(ave_y,2))))
b = (ave_x_ave_y - ave_xy) / (pow(ave_x,2) - ave_x_squ)

print(r)
print(b)