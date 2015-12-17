# -*- coding: utf-8 -*-
#-------编号+实验名称--------------------------------
'''
input:
    各个输入参数的形式
    列表x = []表示什么什么东西，各个元素表示什么，二维列表也要说清楚
    变量y 表示什么东西也要写出来
output:
    lex渲染器需要的参数
    列表x = []表示什么什么东西，各个元素表示什么，二维列表也要说清楚
    变量y 表示什么东西也要写出来
'''
#标准函数处理文件
import phylab
from jinja2 import Template
from jinja2 import Environment

env = Environment(line_statement_prefix="#", variable_start_string="%%", variable_end_string="%%")

def XXX(a,b,c...,source):
    #具体数据处理，要求如下：
    '''
        一个实验所有的数据处理都写在这一个函数里面，去掉调试信息(如print)
        数据尽量用列表整合在一起，比如同类的东西，如质量什么的可以放在一个列表里面，
        一个表格用列表整合，可以考虑使用二维列表，但是要根据实际情况考虑，表格每一行
        计算的平均值要求放在这一行的末尾(append到这个列表的末尾，便于后面工作的进行)
        命名规范：平均值ave_XXXX   A类不确定度ua_XXXX    B类不确定度ub_XXXX
                不确定度u_XXXX
    '''


'''
    ps：文件命名规范如下
        10XXY.py   (物理实验编号10XX的第Y个实验)
        Handle10XXY.tex  (lex处理文件的命名)
        Handle10XXYfinish.tex   （lex处理成功能够生成最终PDF的文件）
'''
    result = env.from_string(source).render(


        
        )
    return result 

def ReadXmlXXX():
    #载入数据处理模板
    file_object = open("Handle10XXY.tex","r")
    #将模板作为字符串存储在template文件中
    source = file_object.read().decode('utf-8', 'ignore')
    
    source = XXX(source)

    return source

if __name__ == '__main__':
    nstr = ReadXmlXXX()
    nfile = open('Handle10XXYfinish.tex','w')
    nfile.write(nstr.encode('utf-8', 'ignore'));
    nfile.close();
