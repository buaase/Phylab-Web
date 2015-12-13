import numpy as np
import matplotlib
import matplotlib.pyplot as plt
from matplotlib.lines import Line2D

def GetTheGraph1022(y_init):

    X_TIMES = 30
    Y_TIMES = 0.1 
    Y_LOW = 1.70

    fig = plt.figure(figsize=(10,10))
    
    for i in np.arange(0,100,1):
        x = [i,i]
        y = [0,100]
        plt.plot(x,y,color="red",linewidth=0.10, linestyle="-")
        
    for i in np.arange(0,100,1):
        x = [i,i]
        y = [0,100]
        plt.plot(x, y, color="red", linewidth=0.25, linestyle="-")

    for i in np.arange(0,100,10):
        x = [i,i]
        y = [0,100]
        plt.plot(x, y, color="red", linewidth=0.75, linestyle="-")


    for i in np.arange(0,100,1):
        y = [i,i]
        x = [0,100]
        plt.plot(x, y, color="red", linewidth=0.10, linestyle="-")

    for i in np.arange(0,100,5):
        y = [i,i]
        x = [0,100]
        plt.plot(x, y, color="red", linewidth=0.25, linestyle="-")

    for i in np.arange(0,100,10):
        y = [i,i]
        x = [0,100]
        plt.plot(x, y, color="red", linewidth=0.75, linestyle="-")
    
    ax=plt.gca()
    ax.set_xticks(np.linspace(0,1,9))
    ax.set_yticks(np.linspace(0,1,8))
    
    plt.xticks((0,10,20,30,40,50,60,70,80,90,100),
    (0*X_TIMES,1*X_TIMES,2*X_TIMES,3*X_TIMES,4*X_TIMES,5*X_TIMES,6*X_TIMES,7*X_TIMES,8*X_TIMES,9*X_TIMES,10*X_TIMES))
    
    plt.yticks((0,10,20,30,40,50,60,70,80,90,100),
    (Y_LOW,Y_LOW+Y_TIMES*1,Y_LOW+Y_TIMES*2,Y_LOW+Y_TIMES*3,Y_LOW+Y_TIMES*4,Y_LOW+Y_TIMES*5,Y_LOW+Y_TIMES*6,Y_LOW+Y_TIMES*7,Y_LOW+Y_TIMES*8,Y_LOW+Y_TIMES*9,Y_LOW+Y_TIMES*10))
    
    x_init = [0,30,60,90,120,150,180,210,240,270,300]
    #y_init = [2.51,2.44,2.37,2.30,2.23,2.16,2.09,2.03,1.97,1.91,1.85]
    
    display_y_init =map(lambda x:10*(x-Y_LOW)/Y_TIMES,y_init)
    
    base_line = np.polyfit(x_init,y_init,1)
    line_func = np.poly1d(base_line)
    display_x = map(lambda x:10*x/X_TIMES,x_init)
    display_y = map(lambda x:10*(line_func(x)-Y_LOW)/Y_TIMES,x_init)
    
    ax.set_xlabel('t/s')
    
    plt.plot(display_x,display_y,linestyle='-',c="blue",linewidth=1)
    
    plt.plot(display_x,display_y_init,linestyle=' ',c="black",marker=Line2D.markers.get('x'),markersize=8)
    
    fig.savefig("1022.png")
    
if __name__ == '__main__':
    GetTheGraph1022()