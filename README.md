# Phylab-Web


## 文档目录

- [技术规格说明书](https://github.com/buaase/Phylab-Web/blob/master/docs/Back-end-frame.md)
- [需求规格说明书](https://github.com/buaase/Phylab-Web/blob/master/docs/Require-Specification.md)
- [用户需求分析文档](https://github.com/buaase/Phylab-Web/blob/master/docs/User-needs.md)
- [团队编码规范文档](https://github.com/buaase/Phylab-Web/blob/master/docs/PSR-SE.md)
- [用户界面原型设计](https://github.com/buaase/Phylab-Web/blob/master/docs/User-Interface.md)

##更新日志

v1.0.2（11.12）
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


v1.0.1（11.11）
- 调整了首页底色为深色
- 首页响应式布局修正，移动设备上显示为图片并列效果
- 调整了图片尺寸，16:9高清屏下全屏浏览模式下不会出现滚动条和留白了
- join community修正，现在点击效果为申请加入交流群
- 把认证错误警告框移到了上边并去除了冗余的文字
- 注册页逻辑修正，现在IE也可以正确检查表达式了，不过由于用到title属性，这一点后续可以修正，封装到JS里面
- 微调了布局中零零散散的标签关闭问题
- 1061lab4已禁用