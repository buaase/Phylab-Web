# -*- coding:utf-8 -*-
#1081激光双棱镜干涉&激光劳埃镜干涉
#科学计数法消除e
def ToScience(number):
    Tempstr = format(number,'.4g')
    #如果发现Tempstr中含有e的话，说明是科学计数法
    if 'e' in  Tempstr:
        index_str = Tempstr.split('e')
        return index_str[0]+'{\\times}10^{'+str(int(index_str[1]))+'}'
    else:
        return Tempstr
#激光双棱镜干涉
#计算δx

#最终结果的对齐
def BitAdapt(x,u_x) :
    ten = 0
    if (u_x >= 10):
        temp = x
        while(temp >= 10):
            temp = temp/10
            ten += 1
        x = float(x)/10**ten
        u_x = float(u_x)/10**ten
    i = 0
    while(1):
        temp = u_x*(10**i)
        if(temp >= 1):
            bit = i
            break;
        else :
            i+=1
    u_x = round(u_x,bit)
    x = round(x,bit)
    res = []
    res.append(x)
    res.append(u_x)
    res.append(ten)
    return res

#全局变量列表：
X = [20]

global:
DELTA_X
UA_10DELTA_X
UB_10DELTA_X
U_10DELTA_X
U_DELTA_X

def cal_delta_x():
    global:DELTA_X,UA_10DELTA_X,UB_10DELTA_X,U_10DELTA_X,U_DELTA_X
    #X为条纹位置数组
    #计算δx
    sum=0
    for x in range(len(X)/2):
        sum+=X(x+len(X)/2)-X(x)
    delta_x=sum/(len(X)/2)**2
    #大写常量作为格式化后要打印在tex文件里的数
    DELTA_X = ToScience(delta_x)
    #计算不确定度
    sum=0
    for x in range(len(X)/2):
        sum+=(10*X(x+len(X)/2)-X(x)-10*delta_x)**2
    ua_10delta_x=math.sqrt(sum/(len(X)*(len(X)-1)))
    UA_10DELTA_X = ToScience(ua_10delta_x)

    ub_10delta_x=0.01/(2*math.sqrt(3))
    UB_10DELTA_X = ToScience(ub_10delta_x)

    u_10delta_x = math.sqrt(ua_10delta_x**2+ub_10delta_x**2)
    U_10DELTA_X = ToScience(u_10delta_x)

    u_delta_x= u_10delta_x /10
    U_DELTA_X = ToScience(u_delta_x)
    #delta_x为条纹间距
    #u_delta_x为δx的不确定度
    return delta_x,u_delta_x
#计算波长lab
def cal_lab(b1,b2,x,delta_x):
    #b1,b2各为长度为4的数组，记录正(两次)反(两次)共4次b值
    #x中存放光源，成小像，成大像x位置
    #delta_x为δx值
    #计算lab
    avg_b1=(b1(0)-b1(1)+b1(3)-b1(2))/2
    avg_b2=(b2(0)-b2(1)+b2(3)-b2(2))/2
    s1=x(0)-x(1)
    s2=x(0)-x(2)
    lab=delta_x*math.sqrt(b1*b2)/(s1+s2)
    #计算不确定度
    u_b1=0.025*avg_b1/math.sqrt(3)
    u_b2=0.025*avg_b2/math.sqrt(3)
    u_s1=5/math.sqrt(3)
    u_s1s2=math.sqrt(2)*u_s1
    u_lab=math.sqrt((u_delt_x/delta_x)**2+1/4*(u_b1/b1)**2+1/4*(u_b2/b2)**2+(u_s1s2/(s1+s2))**2)
    #lab为波长
    #u_lab为lab的不确定度
    return lab,u_lab

#激光劳埃镜干涉
#一元线性回归计算条纹间距
def cal_delta_x(X,a,D):
    #X内存放观测到的条纹位置
    #a为双光源间距
    #D为光源到屏的间距
    #计算delta_x
    sum=0
    for x in range(len(X)):
        sum+=x+1
    avg_x=sum/len(X)
    sum=0
    for x in range(len(X)):
        sum+=X(x)
    avg_y=sum/len(X)
    sum=0
    for x in range(len(X)):
        sum+=X(x)*(x+1)
    avg_xy=sum/len(X)
    sum=0
    for x in range(len(X)):
        sum+=X(x)**2
    avg_y2=sum/len(X)
    sum=0
    for x in range(len(X)):
        sum+=(x+1)**2
    avg_x2=sum/len(X)
    b=(avg_x*avg_y-avg_xy)/(avg_x**2-avg_x2)
    a=avg_y-b*avg_x
    r=(avg_xy-avg_x*avg_y)/math.sqrt((avg_x2-avg_x**2)*(avg_y2-avg_y**2))
    delta_x=b
    ua_delta_x=b*math.sqrt(1/r**2-1)
    ub_delta_x=0.005/math.sqrt(3)
    u_delta_x=math.sqrt(ua_delta_x**2+ub_delta_x**2)
    #计算波长
    lab=a/D*delta_x
    ur_lab=abs(lab-650)/650
    u_lab=math.sqrt((u_delta_x/delta_x)**2+(u_a/a)**2+(u_d/d)**2)
    #delta_x为δx
    #ua_delta_x为δx的不确定度
    #lab为波长
    #u_lab为波长的不确定度
    return delta_x,u_delta_x,lab,u_lab

def WriteTex10811():


if __name__ == '__main__':
    nstr = ReadXmlThreePrism()
    nfile = open('D://Handle1071Three_Temp.tex','w')
    nfile.write(nstr.encode('utf-8', 'ignore'));
    nfile.close();