# Overview [![Build Status](https://drone.io/github.com/buaase/Phylab-Web/status.png)](https://drone.io/github.com/buaase/Phylab-Web/latest)

本项目旨在为全国高校的物理实验提供自动计算与报告生成的自动化计算功能，欢迎广大开源爱好者参与。

我们的网站是：[Phylab](http://121.42.204.94)

# Docs

- [技术规格说明](https://github.com/buaase/Phylab-Web/blob/master/docs/Back-end-frame.md)
- [需求规格说明](https://github.com/buaase/Phylab-Web/blob/master/docs/Require-Specification.md)
- [用户需求分析](https://github.com/buaase/Phylab-Web/blob/master/docs/User-needs.md)
- [团队编码规范](https://github.com/buaase/Phylab-Web/blob/master/docs/PSR-SE.md)
- [用户界面原型](https://github.com/buaase/Phylab-Web/blob/master/docs/User-Interface.md)


# ChangeLog

## Build 1.2.2
**Release Date: 22 December 2015**
- 实用小工具加入，Beta阶段基本完成

## Build 1.2.1
**Release Date: 20 December 2015**
- wecenter的bug修复与认证登陆
- 注册页面UI修改与统一

## Build 1.2
**Release Date: 17 December 2015**
- wecenter与laravel框架对接成功
- wecenter论坛已经可用

## Build 1.1.2
**Release Date: 23 November 2015**
- drone.io自动测试部署成功
- 域名正式启用，域名为buaaphylab.com

## Build 1.1.1
**Release Date: 20 November 2015**
- 服务器性能升级,内存从1G增加到2G

## Build 1.1
**Release Date: 16 November 2015**
- 增加了1021实验的图表生成，第一次完美实现了图表的展示。
- 增加了反馈页面，并且可以便捷加入QQ群

## Build 1.02
**Release Date: 12 November 2015**
- 增加了LOADING动画，点击生成报告后实验选择框会隐藏
- 延迟POST实验数据，延迟时间暂定为1000+2000*random() ms
- 新的英文字体已经可以使用
- 导入数据即可收藏的bug已经修复了
- 选择实验的正则bug修复
- 实验数据警告框的延迟时长修正为3s
- 数据表格的实验名typo修复，选择表格里的不在前端控制范围内
- 未选择子实验时，保存数据会弹出提示选择子实验的警告信息了
- 收藏夹模态框排版优化
- 1061和1081的实验数据处理已经成功完成，等待上线

## Build 1.01
**Release Date: 11 November 2015**
- 调整了首页底色为深色
- 首页响应式布局修正，移动设备上显示为图片并列效果
- 调整了图片尺寸，16:9高清屏下全屏浏览模式下不会出现滚动条和留白了
- join community修正，现在点击效果为申请加入交流群
- 把认证错误警告框移到了上边并去除了冗余的文字
- 注册页逻辑修正，现在IE也可以正确检查表达式了，不过由于用到title属性，这一点后续可以修正，封装到JS里面
- 微调了布局中零零散散的标签关闭问题
- 1061lab4已禁用
