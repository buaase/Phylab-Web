# PSR-SE
=====================

Phylab-Web项目将采用[]()

本文件为软剑攻城队Phylab-Web项目的基本编码规范，本编码规范主体内容取自
[PSR-1](https://github.com/PizzaLiu/PHP-FIG/blob/master/PSR-1-basic-coding-standard-cn.md)和[PSR-2](https://github.com/PizzaLiu/PHP-FIG/blob/master/PSR-2-coding-style-guide-meta-cn.md)，并在`PSR-2和PSR-1`的基础上为统一团队风格，进行了部分改动。

本规范的价值在于我们都遵循这个编码风格，而不是在于它本身，所以我们针对一些本项目的特定领域做出了规范。


1. 概览
-----------

- PHP代码文件以 `<?php` 或 `<?=` 标签开始；

- PHP代码文件以 `不带BOM的 UTF-8` 编码；

- PHP代码中只定义类、函数、常量等声明，或其他会产生 `从属效应` 的操作（如：生成文件输出以及修改.ini配置文件等），二者只能选其一；

- 每行的字符数应该软性保持在80个之内， 尽量不多于120个。

- 每个 namespace 命名空间声明语句和 use 声明语句块后面，必须插入一个空白行。

- 类的命名遵循 `StudlyCaps` 大写开头的驼峰命名规范，类的属性名命名遵循下划线分隔式小写命名规范`$under_score`。

- 类中的常量所有字母都大写，单词间用下划线分隔；

- 类的开始花括号`{`必须写在函数声明后自成一行，结束花括号`}`也必须写在函数主体后自成一行。
 
- 类的属性和方法必须添加访问修饰符（private、protected 以及 public）， abstract 以及 final 必须声明在访问修饰符之前，而 static 必须声明在访问修饰符之后。

- 方法名称符合 `camelCase` 式的小写开头驼峰命名规范。

- 方法的开始花括号`{`必须写在函数声明后自成一行，结束花括号`}`也必须写在函数主体后自成一行。

- 控制结构的关键字后必须要有一个空格符，而调用方法或函数时则一定不能有。

- 控制结构的开始花括号`{`必须写在声明的同一行，而结束花括号`}`必须写在主体后自成一行。

- 代码必须使用4个空格符而不是 tab键 进行缩进。

### 1.1 例子

以下例子程序简单展示了上述大部分规范：

```php
<?php
namespace Vendor\Package;

use FooInterface;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class Foo extends Bar implements FooInterface
//类名符合大写开头的驼峰命名法
{
    public function sampleFunction($a, $b = null)
    //方法符合小写开头驼峰命名法
    {
        if ($a === $b) {
        //控制结构后有一个空格
            bar();
            //调用方法时没有空格
        } elseif ($a > $b) {
            $foo->bar($arg1);
        } else {
            BazClass::bar($arg2, $arg3);
        }
    }

    final public static function bar()
    {
        // method body
    }
}
```

2. 文件
--------

### 2.1. PHP标签

PHP代码**必须**使用 `<?php ?>` 长标签，**一定不可**使用其它自定义标签。

### 2.2. 字符编码

PHP代码**必须**且只可使用`不带BOM的UTF-8`编码。

### 2.3. 从属效应（副作用）

一份PHP文件中**应该**要不就只定义新的声明，如类、函数或常量等不产生从属效应的操作，要不就只有会产生从属效应的逻辑操作，但**不该**同时具有两者。

“从属效应”(side effects)一词的意思是，仅仅通过包含文件，不直接声明类、函数和常量等，而执行的逻辑操作。

“从属效应”包含却不仅限于：生成输出、直接的 `require` 或 `include`、连接外部服务、修改 ini 配置、抛出错误或异常、修改全局或静态变量、读或写文件等。

以下是一个反例，一份包含声明以及产生从属效应的代码：

```php
<?php
// 从属效应：修改 ini 配置
ini_set('error_reporting', E_ALL);

// 从属效应：引入文件
include "file.php";

// 从属效应：生成输出
echo "<html>\n";

// 声明函数
function foo()
{
    // 函数主体部分
}
```

下面是一个范例，一份只包含声明不产生从属效应的代码：

```php
<?php
// 声明函数
function foo()
{
    // 函数主体部分
}

// 条件声明不属于从属效应
if (! function_exists('bar')) {
    function bar()
    {
        // 函数主体部分
    }
}
```
### 2.4 行

所有PHP文件必须以一个空白行作为结束。

每行**不应该**多于80个字符，大于80字符的行应该折成多行。

非空行后**一定不能**有多余的空格符。

### 2.5 缩进

代码**必须使用4个空格符**的缩进，一定不能用 tab键 。

### 2.6 关键字


3. 命名空间和类
----------------------------

### 3.1. 命名空间及类的命名

根据规范，每个类都独立为一个文件，且命名空间至少有一个层次：顶级的组织名称（vendor name）。

类的命名必须 遵循 `StudlyCaps` 大写开头的驼峰命名规范。

代码**必须**使用正式的命名空间。

例如：

```php
<?php
namespace Vendor\Model;

class Foo
{
}
```

### 3.2.use 声明

namespace 声明后 必须 插入一个空白行。

所有 use 必须 在 namespace 后声明。

每条 use 声明语句 必须 只有一个 use 关键词。

use 声明语句块后 必须 要有一个空白行。

例如：
```php
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

// ... additional PHP code ...
```

4. 类、属性和方法
-------------------------------------------

此处的“类”指代所有的类、接口以及可复用代码块（traits）

### 4.1. 扩展与继承

关键词 extends 和 implements必须写在类名称的同一行。

类的开始花括号必须独占一行，结束花括号也必须在类主体后独占一行。

```php
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements \ArrayAccess, \Countable
{
    // constants, properties, methods
}
```

implements 的继承列表也可以分成多行，这样的话，每个继承接口名称都必须分开独立成行，包括第一个。

```php
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements
    \ArrayAccess,
    \Countable,
    \Serializable
{
    // constants, properties, methods
}
```

### 4.2. 常量

类的常量中所有字母都**必须**大写，词间以下划线分隔。
参照以下代码：

```php
<?php
namespace Vendor\Model;

class Foo
{
    const VERSION = '1.0';
    const DATE_APPROVED = '2012-06-01';
}
```

### 4.3. 属性

每个属性都必须添加访问修饰符。

一定不可使用关键字 `var` 声明一个属性。

每条语句一定不可定义超过一个属性。

团队中为保持一致，为与类名和其他进行区分，类的属性**必须**使用下划线分隔式，变量名小写 `($under_score)`

以下是属性声明的一个范例：

```php
<?php
namespace Vendor\Package;

class ClassName
{
    public $student_count = null;
}
```


### 4.4. 方法

所有方法都必须添加访问修饰符。

方法名称后一定不能有空格符，其开始花括号必须独占一行，结束花括号也必须在方法主体后单独成一行。参数左括号后和右括号前一定不能有空格。

方法名称**必须**符合 `camelCase()` 式的小写开头驼峰命名规范。

```php
<?php
namespace Vendor\Package;

class ClassName
{
    public function fooBarBaz($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```
### 4.5. 特殊修订-领域结合

在本次项目中，由于涉及到的物理实验各自有各自独特的序号，所以我们可以针对每个物理实验的数据处理方法规定以下编码规范方式，特规范如下：

针对序号为 10XY 序号的实验，该实验有关的类，统一命名为`PhyLab10XY`,而针对非接口规定方法与继承方法，**必须**使用`方法作用+实验序号`的命名方式。

### 4.6. 方法的参数

参数列表中，每个逗号后面**必须**要有一个空格，而逗号前面**一定**不能有空格。

有默认值的参数，**必须**放到参数列表的末尾。

```php
<?php
namespace Vendor\Package;

class ClassName
{
    public function foo($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```
参数列表可以分列成多行，这样，包括第一个参数在内的每个参数都**必须**单独成行。

如果拆分成多行的参数列表后，结束括号以及方法开始花括号**必须**写在同一行，中间用一个空格分隔。

```php
<?php
namespace Vendor\Package;

class ClassName
{
    public function aVeryLongMethodName(
        ClassTypeHint $arg1,
        &$arg2,
        array $arg3 = []
    ) {
        // method body
    }
}

```

### 4.7. abstract 、 final 、 以及 static

需要添加 abstract 或 final 声明时， **必须**写在访问修饰符前，而 static 则**必须**写在其后。

```php
<?php
namespace Vendor\Package;

abstract class ClassName
{
    protected static $foo;

    abstract protected function zim();

    final public static function bar()
    {
        // method body
    }
}
```

### 4.8. 方法及函数调用

方法及函数调用时，方法名或函数名与参数左括号之间一定不能有空格，参数右括号前也 一定不能有空格。每个参数前一定不能有空格，但其后必须有一个空格。
```php
<?php
bar();
$foo->bar($arg1);
Foo::bar($arg2, $arg3);
```
参数可以分列成多行，此时包括第一个参数在内的每个参数都必须单独成行。
```php
<?php
$foo->bar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);
```

5. 控制结构
------

控制结构的基本规范如下：

- 控制结构关键词后**必须**有一个空格。
- 左括号 `(` 后**一定不能**有空格。
- 右括号 `)` 前也**一定不**能有空格。
- 右括号 `)` 与开始花括号 `{` 间**一定**有一个空格。
- 结构体主体**一定**要有一次缩进。
- 结束花括号 `}` **一定**在结构体主体后单独成行。

### 5.1. `if` 、 `elseif` 和 `else`

标准的 `if` 结构如下代码所示，留意 括号、空格以及花括号的位置，
注意 `else` 和 `elseif` 都与前面的结束花括号在同一行。

```php
<?php
if ($expr1) {
    // if body
} elseif ($expr2) {
    // elseif body
} else {
    // else body;
}
```
**应该**使用关键词 `elseif` 代替所有 `else if` ，以使得所有的控制关键字都像是单独的一个词。 

### 5.2. `switch` 和 `case`

标准的 `switch` 结构如下代码所示，留意括号、空格以及花括号的位置。
`case` 语句**必须**相对 `switch` 进行一次缩进，而 `break` 语句以及 `case` 内的其它语句都 必须 相对 `case` 进行一次缩进。
如果存在非空的 `case` 直穿语句，主体里**必须**有类似 `// no break` 的注释。

```php
<?php
switch ($expr) {
    case 0:
        echo 'First case, with a break';
        break;
    case 1:
        echo 'Second case, which falls through';
        // no break
    case 2:
    case 3:
    case 4:
        echo 'Third case, return instead of break';
        return;
    default:
        echo 'Default case';
        break;
}
```
### 5.3. `while` 和 `do while`

一个规范的 `while` 语句应该如下所示，注意其 括号、空格以及花括号的位置。

```php
<?php
while ($expr) {
    // structure body
}
```

标准的 `do while` 语句如下所示，同样的，注意其 括号、空格以及花括号的位置。

```php
<?php
do {
    // structure body;
} while ($expr);
```

### 5.4. `for`

标准的 `for` 语句如下所示，注意其 括号、空格以及花括号的位置。

```php
<?php
for ($i = 0; $i < 10; $i++) {
    // for body
}
```

### 5.5. `foreach`
    
标准的 `foreach` 语句如下所示，注意其 括号、空格以及花括号的位置。

```php
<?php
foreach ($iterable as $key => $value) {
    // foreach body
}
```

### 5.6. `try`, `catch`

标准的 `try catch` 语句如下所示，注意其 括号、空格以及花括号的位置。

```php
<?php
try {
    // try body
} catch (FirstExceptionType $e) {
    // catch body
} catch (OtherExceptionType $e) {
    // catch body
}
```

版本号： v1.0.0