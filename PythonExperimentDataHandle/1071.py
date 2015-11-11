# -*- coding: utf-8 -*-
import xml.dom.minidom
from math import sqrt
from numpy import sin
from numpy import cos
from numpy import pi
from jinja2 import Template
from jinja2 import Environment
import os
import json
import sys
import subprocess

#È«¾Ö±äÁ¿£¬·½±ã¼ÇÂ¼Ô­Ê¼Êý¾Ý
#VertÎªÈýÀâ¾µ¶¥½Ç²âÁ¿Êý×é
angle_a1_vert = []
angle_a2_vert = []
angle_b1_vert = []
angle_b2_vert = []
#RefractÎªÕÛÉäÂÊ²âÁ¿Êý×é
angle_a1_refract = []
angle_a2_refract = []
angle_b1_refract = []
angle_b2_refract = []

global average_A,uA

average_A = 0
uA = 0

env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

#¿ÆÑ§¼ÆÊý·¨Ïû³ýe
def ToScience(number):
    Tempstr = format(number,'.4g')
    #Èç¹û·¢ÏÖTempstrÖÐº¬ÓÐeµÄ»°£¬ËµÃ÷ÊÇ¿ÆÑ§¼ÆÊý·¨
    if 'e' in  Tempstr:
        index_str = Tempstr.split('e')
        return index_str[0]+'{\\times}10^{'+str(int(index_str[1]))+'}'
    else:
        return Tempstr


#·Ö¶È×ª½Ç¶È
def Angle(angle):
    angle = int(angle) + (angle-int(angle))*100/60
    return angle

#¶È×ª»¡¶È
def change(x):
    x = x/180*pi
    return x

#½Ç¶ÈµÄÖµµÄ±ä»»
def ChangeAngle(angle,n):
    angle = abs(angle)
    if angle > 200 :
        return 360 - angle
    return angle

#¼ÆËãaÀà²»È·¶¨¶È
def Ua(x, aver, k) :
    sumx = 0
    for i in range(k):
        sumx += (x[i] - aver)**2
    return sqrt(sumx/(k*(k-1)))

def BitAdapt(x,u_x) :
    ten = 0
    if (u_x >= 10):
        temp = x
        while(temp >= 10):
            temp = temp/10
            ten += 1
        x = float(x)/10**ten
        u_x = float(u_x)/10**ten
    Tempbit = 0;
    bit = 0;
    while (1):
        i = 0
        while(1):
            temp = float(u_x)*(10**i)
            if(temp >= 1):
                bit = i
                break;
            else :
                i+=1
        u_x = round(float(u_x),bit)
        x = round(float(x),bit)
        if bit == 0:
            u_x = ("%.1f" % u_x)
            x = ("%.1f" % x)
        elif bit == 1:
            u_x = ("%.1f" % u_x)
            x = ("%.1f" % x)
        elif bit == 2:
            u_x = ("%.2f" % u_x)
            x = ("%.2f" % x)
        elif bit == 3:
            u_x = ("%.3f" % u_x)
            x = ("%.3f" % x)
        elif bit == 4:
            u_x = ("%.4f" % u_x)
            x = ("%.4f" % x)
        elif bit == 5:
            u_x = ("%.5f" % u_x)
            x = ("%.5f" % x)
        elif bit == 6:
            u_x = ("%.6f" % u_x)
            x = ("%.6f" % x)
        elif bit == 7:
            u_x = ("%.7f" % u_x)
            x = ("%.7f" % x)
        elif bit == 8:
            u_x = ("%.8f" % u_x)
            x = ("%.8f" % x)
        i = 0
        while(1):
            temp = float(u_x)*(10**i)
            if(temp >= 1):
                Tempbit = i
                break;
            else :
                i+=1
        if Tempbit == bit:
            break;

    res = []    
    res.append(x)
    res.append(u_x)
    res.append(ten)
    return res

def ReadXmlTop():
    #´ò¿ªÍ³Ò»µÄÍ·ÎÄ¼þÄ£°æ
    latex_head_file = open('/opt/lampp/htdocs/Phylab-Web/SE_PhysExpeRepo/storage/app/script/Head.tex','r')
    latex_head = latex_head_file.read().decode('utf-8', 'ignore')
    latex_tail = "\n\\end{document}"
    latex_body = ""

    dom = xml.dom.minidom.parse(sys.argv[1])
    #ÎÄµµµÄ¸ù½áµã
    root = dom.documentElement
    #»ñÈ¡µ½Ã¿¸öÐ¡ÊµÑéµÄ¶ÔÓ¦±êÇ©
    sublab_list = root.getElementsByTagName('sublab')
    for sublab in sublab_list:
        sublab_status = sublab.getAttribute("status")
        sublab_id = sublab.getAttribute("id")
        #Èç¹ûstatusÎªtrue£¬±íÃ÷ÓÃ»§Ñ¡ÔñÁË¸ÃÐ¡ÊµÑé
        if (sublab_status == 'true' )& (sublab_id == '10711'):
            ReadXml10711(sublab)
            latex_body += Handle10711()
        elif (sublab_status == 'true')& (sublab_id == '10712'):
            ReadXml10712(sublab)
            latex_body +="\n"+Handle10712()
    return latex_head+latex_body+latex_tail


#sublab_rootÎª×ÓÊµÑéµÄ¸ù½áµã
def ReadXml10711(sublab_root):
    #ÉùÃ÷È«¾Ö±äÁ¿
    global angle_a1_vert,angle_a2_vert,angle_b1_vert,angle_b2_vert

    sublab_table_list = sublab_root.getElementsByTagName("table")

    #trÊÇÖ¸µÚ¼¸ÐÐ£¬ÆäÖÐµÄindexÊôÐÔ´ú±íÁËÆäÐÐÊý
    sublab_table_list = sublab_root.getElementsByTagName("table")
    for table in sublab_table_list:
        table_name = table.getAttribute("name")
        #trÊÇÖ¸µÚ¼¸ÐÐ£¬ÆäÖÐµÄindexÊôÐÔ´ú±íÁËÆäÐÐÊý
        table_tr_list = table.getElementsByTagName("tr")
        for tr in table_tr_list:
            tr_index = tr.getAttribute("index")
            index = int(tr_index)
            tr_td_list = tr.getElementsByTagName("td")
            angle_a1_vert.append(float(tr_td_list[0].firstChild.nodeValue))
            angle_a2_vert.append(float(tr_td_list[1].firstChild.nodeValue))
            angle_b1_vert.append(float(tr_td_list[2].firstChild.nodeValue))
            angle_b2_vert.append(float(tr_td_list[3].firstChild.nodeValue))


def ReadXml10712(sublab_root):
    #ÉùÃ÷È«¾Ö±äÁ¿
    global angle_a1_refract,angle_a2_refract,angle_b1_refract,angle_b2_refract,uA,average_A

    sublab_table_list = sublab_root.getElementsByTagName("table")
    for table in sublab_table_list:
        table_name = table.getAttribute("name")
        table_raw  = table.getAttribute("raw")
        table_column = table.getAttribute("column")
        #trÊÇÖ¸µÚ¼¸ÐÐ£¬ÆäÖÐµÄindexÊôÐÔ´ú±íÁËÆäÐÐÊý
        table_tr_list = table.getElementsByTagName("tr")
        for tr in table_tr_list:
            tr_index = tr.getAttribute("index")         
            index = int(tr_index)
            tr_td_list = tr.getElementsByTagName("td")
            angle_a1_refract.append(float(tr_td_list[0].firstChild.nodeValue))
            angle_b1_refract.append(float(tr_td_list[1].firstChild.nodeValue))
            angle_a2_refract.append(float(tr_td_list[2].firstChild.nodeValue))
            angle_b2_refract.append(float(tr_td_list[3].firstChild.nodeValue))

def VertAngle(source,ANGLE_A1,ANGLE_A2,ANGLE_B1,ANGLE_B2):
    global angle_a1_vert,angle_a2_vert,angle_b1_vert,angle_b2_vert,uA,average_A
    precision = 1.0/60  #¾«¶È£¬´Ë´¦Ä¬ÈÏÎª1'
    sum_A = 0
    k = len(angle_a1_vert)
    angle_A = []
    angle_theta = []

    for i in range(k):
        temp1 = Angle(angle_a2_vert[i]) - Angle(angle_a1_vert[i])
        temp1 = ChangeAngle(temp1,200)
        temp2 = Angle(angle_b2_vert[i]) - Angle(angle_b1_vert[i])
        temp2 = ChangeAngle(temp2,200)
        temp = (temp1 + temp2) / 2
        angle_theta.append(temp)
        angle_A.append(temp / 2)
        sum_A += temp/2

    ANGLE_A = []
    ANGLE_THETA = []

    for a in angle_A:
        minus = int(round((a - int(a))*60))
        ANGLE_A.append({'angle':str(int(a)),'minus':str(minus)})

    for theta in angle_theta:
        minus = int(round((theta - int(theta))*60))
        ANGLE_THETA.append({'angle':str(int(theta)),'minus':str(minus)})
    
    average_A = sum_A / k
    #´óÐ´µÄÊÇ»¡¶È±íÊ¾
    AVERAGE_A = change(average_A)
    AVERAGE_A = ToScience(AVERAGE_A)

    ua_theta = Ua(angle_A, average_A, k)
    #´óÐ´µÄÊÇ»¡¶È±íÊ¾
    UA_THETA = change(ua_theta)
    UA_THETA = ToScience(UA_THETA)

    ub_theta =precision / sqrt(3)
    u_theta = sqrt(pow(ua_theta,2) + pow(ub_theta,2))
    #´óÐ´µÄÊÇ»¡¶È±íÊ¾
    U_THETA = change(u_theta)
    U_THETA = ToScience(U_THETA)

    uA = u_theta/2
    #´óÐ´µÄ»¡¶È±íÊ¾
    U_A = change(uA)
    U_A = ToScience(U_A)

    re_u= uA / average_A #Ïà¶Ô²»È·¶¨¶È
    RE_U = change(re_u)
    RE_U = ToScience(RE_U)

    RESULT = BitAdapt(change(average_A),change(uA))
    RESULT_A = RESULT[0]
    RESULT_UA = RESULT[1]

    result = env.from_string(source).render(
        ANGLE_A = ANGLE_A,
        ANGLE_THETA = ANGLE_THETA,
        ANGLE_A1_VERT = ANGLE_A1,
        ANGLE_A2_VERT = ANGLE_A2,
        ANGLE_B1_VERT = ANGLE_B1,
        ANGLE_B2_VERT = ANGLE_B2,
        AVERAGE_A = AVERAGE_A,
        UA_THETA = UA_THETA,
        U_THETA = U_THETA,
        U_A = U_A,
        RE_U = RE_U,
        RESULT_A = RESULT_A,
        RESULT_UA = RESULT_UA
        )

    return result

#×ö·¨:ReadXmlÎÄ¼þÀïÓ¦¸ÃÏÈ¶ÔÃ¿¸öÊµÑé½øÐÐ²»Í¬µÄ¶ÁxmlÎÄ¼þµÄ²Ù×÷
def Handle10711():
    global angle_a1_vert,angle_a2_vert,angle_b1_vert,angle_b2_vert
    #ÔØÈë1071Èý½ÇÐÍ¶¥½Ç²âÁ¿Êý¾Ý´¦ÀíÄ£°å
    file_object = open("/opt/lampp/htdocs/Phylab-Web/SE_PhysExpeRepo/storage/app/script/Handle10711.tex","r")
    #½«Ä£°å×÷Îª×Ö·û´®´æ´¢ÔÚtemplateÎÄ¼þÖÐ
    source = file_object.read().decode('utf-8', 'ignore')

    ANGLE_A1 = []
    ANGLE_A2 = []
    ANGLE_B1 = []
    ANGLE_B2 = []

    for a1 in angle_a1_vert:
        tempstr = str(a1-int(a1))
        if '.' in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_A1.append({'angle':int(a1),'minus':tempstr})

    for a2 in angle_a2_vert: 
        tempstr = str(a2-int(a2))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_A2.append({'angle':int(a2),'minus':tempstr})

    for b1 in angle_b1_vert:
        tempstr = str(b1-int(b1))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_B1.append({'angle':int(b1),'minus':tempstr})

    for b2 in angle_b2_vert:
        tempstr = str(b2-int(b2))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_B2.append({'angle':int(b2),'minus':tempstr})
    
    #µ÷ÓÃÖ÷Òª´¦Àíº¯Êý
    source = VertAngle(source,ANGLE_A1,ANGLE_A2,ANGLE_B1,ANGLE_B2)

    return source


def Handle10712():
    global angle_a1_refract,angle_b1_refract,angle_a2_refract,angle_b2_refract,uA,average_A

    ANGLE_A1 = []
    ANGLE_A2 = []
    ANGLE_B1 = []
    ANGLE_B2 = []

    file_object = open("/opt/lampp/htdocs/Phylab-Web/SE_PhysExpeRepo/storage/app/script/Handle10712.tex","r")
    #½«Ä£°å×÷Îª×Ö·û´®´æ´¢ÔÚtemplateÎÄ¼þÖÐ
    source = file_object.read().decode('utf-8', 'ignore')
    
    for a1 in angle_a1_refract:
        tempstr = str(a1-int(a1))
        if '.' in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_A1.append({'angle':int(a1),'minus':tempstr})

    for a2 in angle_a2_refract: 
        tempstr = str(a2-int(a2))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_A2.append({'angle':int(a2),'minus':tempstr})

    for b1 in angle_b1_refract:
        tempstr = str(b1-int(b1))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_B1.append({'angle':int(b1),'minus':tempstr})

    for b2 in angle_b2_refract:
        tempstr = str(b2-int(b2))
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_B2.append({'angle':int(b2),'minus':tempstr})

    source = Refract(source,ANGLE_A1,ANGLE_A2,ANGLE_B1,ANGLE_B2)

    return source


def Refract(source,ANGLE_A1_MIN,ANGLE_A2_MIN,ANGLE_B1_MIN,ANGLE_B2_MIN):
    precision = 1.0/60  #¾«¶È£¬´Ë´¦Ä¬ÈÏÎª1'
    angle_min = []
    ANGLE_DELTA_MIN = []
    sum_min = 0
    k = len(angle_a1_refract)
    for i in range(k) :
        temp1 = Angle(angle_a2_refract[i]) - Angle(angle_a1_refract[i])
        temp1 = ChangeAngle(temp1,100)
        temp2 = Angle(angle_b2_refract[i]) - Angle(angle_b1_refract[i])
        temp2 = ChangeAngle(temp2,100)
        temp = (temp1 + temp2) / 2
        angle_min.append(temp)
        tempstr = round(temp-int(temp)*60,2)
        tempstr = str(tempstr)
        if "." in tempstr:
            tempstr = tempstr.split('.')[1]
        ANGLE_DELTA_MIN.append({'angle':int(temp),'minus':tempstr})
        sum_min += temp

    average_min = sum_min / k
    average_min_rad = change(average_min)
    AVERAGE_MIN = ToScience(average_min_rad)

    AVERAGE_A = change(average_A)
    AVERAGE_A = ToScience(AVERAGE_A)

    n1 = sin(change( (average_min+average_A) / 2 )) / sin(change(average_A / 2))
    N1 = ToScience(n1)

    ua_min = Ua(angle_min, average_min, k)
    #»¡¶È
    ua_min = change(ua_min)
    UA_MIN = ToScience(ua_min)

    #AµÄ²»È·¶¨¶È
    U_A = change(uA)
    U_A = ToScience(U_A)


    ub_min = precision/sqrt(3)
    ub_min = change(ub_min)
    UB_MIN = ToScience(ub_min)

    u_min = sqrt(pow(ua_min,2) + pow(ub_min,2))
    U_MIN = ToScience(u_min)

    temp1 = cos(change((average_min + average_A)/2)) * u_min / 2 / sin(change(average_A/2))
    temp2 = sin(change(average_min/2))*change(uA)/2/pow(sin(change(average_A/2)),2)
    u_n1 = sqrt(pow(temp1,2)+pow(temp2,2))
    U_N1 = ToScience(u_n1)

    re_u = u_n1/n1 #Ïà¶Ô²»È·¶¨¶È
    RE_U_MIN = ToScience(re_u)

    RESULT = BitAdapt(n1,u_n1)
    RESULT_N1 = RESULT[0]
    RESULT_U_N1 = RESULT[1]

    result = env.from_string(source).render(
        ANGLE_DELTA_MIN = ANGLE_DELTA_MIN,
        ANGLE_A1_MIN = ANGLE_A1_MIN,
        ANGLE_A2_MIN = ANGLE_A2_MIN,
        ANGLE_B1_MIN = ANGLE_B1_MIN,
        ANGLE_B2_MIN = ANGLE_B2_MIN,
        AVERAGE_A = AVERAGE_A,
        AVERAGE_MIN = AVERAGE_MIN,
        U_A = U_A,
        RE_U_MIN = RE_U_MIN,
        UA_MIN = UA_MIN,
        N1 = N1,
        U_MIN = U_MIN,
        U_N1 = U_N1,
        RESULT_N1 = RESULT_N1,
        RESULT_U_N1 = RESULT_U_N1
        )

    return result


if __name__ == '__main__':
    try:
        finish_str = ReadXmlTop()
        finish_file = open(sys.argv[2],"w")
        finish_file.write(finish_str.encode('utf-8', 'ignore'))
        finish_file.close()
        #等于１时是错误
        ret =  subprocess.call("xelatex -interaction=nonstopmode "+sys.argv[2],shell=True)
        subprocess.call("rm "+sys.argv[2]+".aux",shell=True)        
        subprocess.call("rm "+sys.argv[2]+".synctex*",shell=True)
        subprocess.call("rm "+sys.argv[2]+".log",shell=True)
        if ret==0:
            print('{"status":"success"}')
        else:
            print('{"status":"fail"}')
    except Exception as e:
        print(traceback.format_exc())