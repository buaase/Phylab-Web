# 用户界面原型设计

## 1. 概述

在本次项目中，我们使用了`MockUpBuilder`工具进行了用户界面的原型设计，并且经过了反复多次的用户原型设计修改，最终

## 2. 首页

### 2.1. 首页预览版

![首页](https://github.com/buaase/Phylab-Web/blob/master/docs/UserInterface/Index.png)

上图为我们所设计的首页预览版原型图，涉及到的按钮与功能有：

按钮 | 功能 
---- | -----
Home | 如果用户已处于登录状态，则返回用户登录时的主页；如果用户处于未登录状态，则返回用户预览主页。
Community | 点击后进入物理实验交流平台页面
Login | 点击后进入用户登录页面
Register | 点击后进入用户注册页面
Search | 搜索后自动进入物理实验交流平台页面，并显示对帖子内容搜索结果返回的界面
Try it now! | 如果当前用户已经登录，则自动跳转到物理实验报告生成页面；否则跳转至用户登录页面，当用户登录完成后，自动跳转到物理实验报告生成页面。
? | 弹出弹窗，并显示一些物理实验的相关注意事项

> 注:物理实验交流平台是后期功能，将放在beta版本中进行开发

- 在网站主体左侧是一个`物理实验平台与工具的使用视频`。

- 在网站主体右侧显示我们项目的特色：

- 根据用户数据定制物理实验报告
	- 支持生成图表
	- 支持显示公式
	- 支持物理实验文档pdf导出
	- 支持用户收藏定制的物理实验报告
	- 老师与学生的互动交流平台
- 在网站右下角显示了当前的日历与时间

### 2.2. 首页登录版

![首页](https://github.com/buaase/Phylab-Web/blob/master/docs/UserInterface/Index_Login.png)

首页登录版增加的功能是：
当用户点击右上角的`User welcome`时，弹出一个悬浮框，有两个按钮，按钮功能如下：

按钮 | 功能 
---- | -----
Personal Center| 点击后进入用户的个人中心
LOG OUT | 点击后退出登录状态，页面跳转向首页预览版界面。

## 3. 登录

![登录界面](https://raw.githubusercontent.com/buaase/Phylab-Web/master/docs/UserInterface/Login.png)

以上是我们设计的登录界面原型图，涉及到的控件与功能有：

控件 | 功能
--- | ---
Home | 返回首页预览版
Email/Name | 填入用户名或邮箱以登录。输入的用户名长度限制在6-20个字符之间：如果用户名长度不符合限制或输入了非法字符，右侧的checkbox将变为错误状态；如果输入的邮箱不符合邮箱合法检查的正则表达式，右侧的checkbox将变为错误状态。其他情况，右侧checkbox处于正确状态。
Password | 填入密码。输入的密码长度限制在6-15个字符之间：如果密码长度不符合限制，右侧的checkbox变为错误状态。否则checkbox处于正确状态。
Sign in!|使用填好的用户名和密码在数据库中进行查询，如果记录不为空则自动跳转到首页登录版，否则跳转到登录界面。

## 4.个人中心

### 4.1. 个人中心—个人资料

![个人中心界面](https://github.com/buaase/Phylab-Web/blob/master/docs/UserInterface/User.png)

以上是我们设计的个人中心—个人资料的原型图，涉及到的控件与功能有：

控件 | 功能
--- | ---
Edit Profile | 更改个人资料，能更改的属性包括：Company，NickName，Introduction，Course(目前的物理实验积分情况)
Share | 点击下方的分享按钮后，可以分享到新浪微博等。
Change Password | 点击修改密码后，将进入修改密码的界面。
Log out | 点击后进入首页预览版界面。
Profile | 点击Profile时切换显示`个人资料`的标签页
Favorite | 点击Favorite时切换显示`用户收藏报告`标签页

> 注：Course是我们考虑在beta版本中可能推出的一个物理实验课程推荐功能的基础，暂时只当作课程积分资料使用。
> Share的分享功能也考虑在beta版本交流平台成熟后增设。

### 4.2. 个人中心—用户收藏报告

![](https://github.com/buaase/Phylab-Web/blob/master/docs/UserInterface/User_Favor.png)

以上是我们设计的个人中心—用户收藏报告的原型图，涉及到的主要是可点击的物理实验报告，用户在点击物理实验报告的链接后，会新建一个页面，显示用户在服务器上存放的特定的实验pdf文件。

## 5. 生成报告

![](https://github.com/buaase/Phylab-Web/blob/master/docs/UserInterface/Generate.png)

以上是我们设计的生成报告的原型图，涉及到的控件与功能有：

- 主体左侧上方是个下拉列表框，可以选择带有实验序号和实验名称的实验。
- 主体左侧下方按钮`Import data table`即导入数据表，数据表的形式是excel。
[FIXME]

