# php_chromechecker
一个Chrome离线包下载检查的PHP实现,方法来自于[ChromeChecker](https://github.com/neoFelhz/ChromeChecker/)

感谢[neoFelhz](https://github.com/neoFelhz)

# 主程序说明
主程序为crcheck.php 现只提供网页版访问版 使用GET方式传送.
## 调用参数
ver:选择的系统位数 默认为auto
* win:32位版
* win64:64位版
* auto:自动判断,根据系统位数选择

channel:选择的频道 有stable beta dev canary四种通道 默认为stable

mode:选择的模式 默认为direct
* json:把chrome的版本 下载地址 文件HASH 大小输出到一个json里面
* direct: 直接导向chrome的下载地址
* debug:调试专用
