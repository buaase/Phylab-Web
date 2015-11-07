__author__ = 'Lydia'
import math
#实验1011-拉伸法测钢丝弹性模量
#delta即△，lambda即λ，ave即平均值

m = [float(i) for i in input('请输入 8次的重物质量m(i)(kg)（8个数据之间以空格分割，换行结束）: ').split()]
C_plus = [float(j) for j in input('请输入 8次增砝码的钢丝伸长量Ci+(i)(cm)（8个数据之间以空格分割，换行结束）: ').split()]
C_sub = [float(k) for k in input('请输入 8次减砝码的钢丝伸长量Ci-(i)(cm)（8个数据之间以空格分割，换行结束）: ').split()]

C = []
for i in range(0,8,1):
    C.append((C_plus[i] + C_sub[i]) / 2)

print(C)

delta_C1 = (C[4] - C[0]) / 4
delta_C2 = (C[5] - C[1]) / 4
delta_C3 = (C[6] - C[2]) / 4
delta_C4 = (C[7] - C[3]) / 4

delta_C = (delta_C1 + delta_C2 + delta_C3 + delta_C4) / 4

print(delta_C1)
print(delta_C2)
print(delta_C3)
print(delta_C4)
print(delta_C)

x0 = eval(input("请输入千分尺的零点x0(mm):"))
x = [float(i) for i in input('请输入 5次测量钢丝直径的读数x(i)(mm)（5个数据之间以空格分割，换行结束）: ').split()]
D = []
D_cal = []
for i in range(0,5,1):
    D.append(x[i] - x0)
ave_D = sum(D) / 5

print(D)
print(ave_D)

for i in range(0,5,1):
    D_cal.append(pow(D[i] - ave_D,2))

L = eval(input("请输入钢丝长度L(cm):"))
H = eval(input("请输入平面镜到标尺的距离H(cm):"))
b = eval(input("请输入光杠杆前后足的间距(cm):"))

E = 16 * 9.8 * L * H * pow(10,6) / (math.pi * pow(ave_D,2) * b * delta_C)
u_delta_C = math.sqrt((pow(delta_C1 - delta_C,2)+pow(delta_C2 - delta_C,2)+pow(delta_C3 - delta_C,2)+pow(delta_C4 - delta_C,2)) / 12)
u_D = math.sqrt(sum(D_cal) / 20)
u_b = 0.02 / math.sqrt(3)
u_L = 0.3 / math.sqrt(3)
u_H = 0.5 / math.sqrt(3)

print(E)
print(u_delta_C)
print(u_D)
print(u_b)
print(u_L)
print(u_H)

u_E_E = math.sqrt(pow(u_L / L,2)+pow(u_H / H,2)+pow(2 * u_D / ave_D,2)+pow(u_b / b,2)+pow(u_delta_C / delta_C,2))
u_E = u_E_E * E

print(u_E_E)
print(u_E)