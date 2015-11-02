## 测量冰的溶解热实验

### 前后热平衡方程：
```latex
c_{1}M(T_{0}-T_{1})+ML+c_{0}M(T_{3}-T_{0})=(c_{0}m+c_{1}m_{1}+c_{2}m_{2}+\delta m)(T_{2}-T_{3})
```
```latex
T_{0}=0$^\circ$C \par
```
### 冰的熔解热：
```latex
L=\frac{1}{M}(c_{0}m+c_{1}m_{1}+c_{2}m_{2}+\delta m)(T_{2}-T_{3})-c_{0}T_{3}+c_{1}T_{1}
```
### 牛顿冷却定律：
```latex
\frac{\delta q}{\delta t}=K(T-\theta )
```

### 推出式：
```latex
q=\int_{t_{2}}^{t_{3}}K(T-\theta )dt = K\int_{t_{2}}^{t_{\theta}}(T-\theta )dt+K\int_{t_{\theta }}^{t_{3 }}(T-\theta )dt
```

### SA约等于SB：
```latex
S_{A}\approx S_{B}
```

## 电热法测量焦耳热功当量

```latex 
J=\frac{W}{Q}
```
### 吸收的热量：
```latex
Q=(c_{0}m_{0}+c_{1}m_{1}+c_{2}m_{2})(\theta -\theta_{0})=Cm(\theta-\theta_{0})
```

### 热功当量：
```latex
J=VIt/Cm(\theta-\theta_{0})
```

### 散热修正：
```latex
\frac{d\theta}{dt} |_{吸}=\frac{VI}{JCm}   
\frac{d\theta}{dt} |_{放}=-K(\theta-\theta_{环}) 
\frac{d\theta}{dt}=\frac{VI}{JCm}-K(\theta - \theta_{环}) 
y=\frac{d\theta}{dt}		
x=\theta-\theta_{环}  
y=a+bx		
a=\frac{VI}{JCm}	
b=-K
t=\frac{t_{i}+t_{i+1}}{2}	
\theta=\frac{\theta_{i}+\theta_{i+1}}{2}	
\frac{d\theta}{dt}=\frac{\theta_{i}+\theta_{i+1}}{t_{i}+t_{i+1}}
a=\frac{v^{2}}{RJCm}\rightarrow J=\frac{v^{2}}{aRCm}
```