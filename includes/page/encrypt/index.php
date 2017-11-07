<!DOCTYPE html>
<html>
    <head>
        <title>哈希函数计算 - <?php echo $gSitename;?></title>
        <?php global $gCommonHead;echo $gCommonHead;?>
        <script type="text/javascript">
            function onclickAction(id){
                var arr = new Array('md2', 'md4', 'md5', 'sha1', 'sha224', 'sha256', 'sha384', 'sha512');
                for (var x = 0; x<arr.length; x++){ //for循环，隐藏所有arr数组里的元素
                    document.getElementById(arr[x]).style.display = 'none';
                }
                var divid = document.getElementById(id); //显示名为id的div
                divid.style.display = 'block';
            }
        </script>
        <style>
            .display{display: none;}
        </style>
    </head>
    <body>
        <h1>哈希函数计算</h1>
        选择你想计算的种类<br>
        <form name="哈希函数计算" method="post" action="index.php?title=encrypt&action=result">
            <div>
                <input name="type" type="radio" value="md2" onclick="onclickAction('md2')">MD2函数 <input name="type" type="radio" value="md4" onclick="onclickAction('md4')">MD4函数 <input name="type" type="radio" value="md5" onclick="onclickAction('md5')">MD5函数<br>
                <input name="type" type="radio" value="sha1" onclick="onclickAction('sha1')">SHA-1函数<br>
                <input name="type" type="radio" value="sha224" onclick="onclickAction('sha224')">SHA-224函数 <input name="type" type="radio" value="sha256" onclick="onclickAction('sha256')">SHA-256函数 <input name="type" type="radio" value="sha384" onclick="onclickAction('sha384')">SHA-384函数 <input name="type" type="radio" value="sha512" onclick="onclickAction('sha512')">SHA-512函数
            </div>
            <!--隐藏div-->
            <div id="md2" class="display"><!--MD2函数-->
                <hr/>
                输入 <input name="md2" type="text"> <input name="提交" type="submit" value="计算"> <input name="capital" type="checkbox" value="1"> 大写输出的文本<br>
                <b>MD2消息摘要算法</b>是Ronald Rivest于1989年开发的加密散列函数2。该算法针对8位计算机进行了优化。MD2在RFC 1319中规定。尽管MD2不再被认为是安全的，但在2014年之前，它仍然在公开金钥基础建设中使用，作为使用MD2和RSA生成的证书的一部分。
            </div>
            <div id="md4" class="display"><!--MD4函数-->
                <hr/>
                输入 <input name="md4" type="text"> <input name="提交" type="submit" value="计算"> <input name="capital" type="checkbox" value="1"> 大写输出的文本<br>
                <b>MD4</b>是麻省理工学院教授Ronald Rivest于1990年设计的一种信息摘要算法。它是一种用来测试信息完整性的密码散列函数的实行。其摘要长度为128位。这个算法影响了后来的算法如MD5、SHA家族和RIPEMD等。
                1991年Den Boer和Bosselaers发表了一篇文章指出MD4的短处，至今未能找到基于MD4以上改进的算法有任何可以用来进攻的弱点。
                2004年8月王小云报告在计算MD4时可能发生杂凑冲撞。
            </div>
            <div id="md5" class="display"><!--MD5函数-->
                <hr/>
                输入 <input name="md5" type="text"> <input name="提交" type="submit" value="计算"> <input name="capital" type="checkbox" value="1"> 大写输出的文本<br>
                <b>MD5讯息摘要演算法</b>（英语：<i>MD5 Message-Digest Algorithm</i>），一种被广泛使用的密码杂凑函数，可以产生出一个128位元（16位元组）的散列值（hash value），用于确保信息传输完整一致。MD5由罗纳德·李维斯特设计，于1992年公开，用以取代MD4演算法。这套演算法的程序在 RFC 1321 中被加以规范。
                将数据（如一段文字）运算变为另一固定长度值，是杂凑算法的基础原理。
                1996年后被证实存在弱点，可以被加以破解，对于需要高度安全性的资料，专家一般建议改用其他演算法，如SHA-1。2004年，证实MD5演算法无法防止碰撞，因此无法适用于安全性认证，如SSL公开金钥认证或是数位签章等用途。
            </div>
            <div id="sha1" class="display"><!--SHA-1函数-->
                <hr/>
                输入 <input name="sha1" type="text"> <input name="提交" type="submit" value="计算"> <input name="capital" type="checkbox" value="1"> 大写输出的文本<br>
                <b>SHA-1</b>（英语：<i>Secure Hash Algorithm 1</i>，中文名：安全散列算法1）是一种密码散列函数，美国国家安全局设计，并由美国国家标准技术研究所（NIST）发布为联邦资料处理标准（FIPS）。SHA-1可以生成一个被称为消息摘要的160位（20字节）散列值，散列值通常的呈现形式为40个十六进制数。
                SHA-1已经不再视为可抵御有充足资金、充足计算资源的攻击者。2005年，密码分析人员发现了对SHA-1的有效攻击方法，这表明该算法可能不够安全，不能继续使用，自2010年以来，许多组织建议用SHA-2或SHA-3来替换SHA-1。Microsoft、Google以及Mozilla都宣布，它们旗下的浏览器将在2017年前停止接受使用SHA-1算法签名的SSL证书。
                2017年2月23日，CWI Amsterdam与Google宣布了一个成功的SHA-1碰撞攻击，发布了两份内容不同但SHA-1散列值相同的PDF文件作为概念证明。
            </div>
            <div id="sha224" class="display"><!--SHA-224函数-->
                <hr/>
                输入 <input name="sha224" type="text"> <input name="提交" type="submit" value="计算"> <input name="capital" type="checkbox" value="1"> 大写输出的文本<br>
                <b>SHA-2</b>，名称来自于安全散列演算法2（英语：<i>Secure Hash Algorithm 2</i>）的缩写，一种密码杂凑函数演算法标准，由美国国家安全局研发，由美国国家标准与技术研究院（NIST）在2001年发布。属于SHA演算法之一，是SHA-1的后继者。其下又可再分为六个不同的演算法标准，包括了：SHA-224、SHA-256、SHA-384、SHA-512、SHA-512/224、SHA-512/256。<br>
                <br>SHA-224是SHA-2家族的一员，可以生成224位的散列值。目前没有对SHA-2家族有效的攻击手段。
            </div>
            <div id="sha256" class="display"><!--SHA-256函数-->
                <hr/>
                输入 <input name="sha256" type="text"> <input name="提交" type="submit" value="计算"> <input name="capital" type="checkbox" value="1"> 大写输出的文本<br>
                <b>SHA-2</b>，名称来自于安全散列演算法2（英语：<i>Secure Hash Algorithm 2</i>）的缩写，一种密码杂凑函数演算法标准，由美国国家安全局研发，由美国国家标准与技术研究院（NIST）在2001年发布。属于SHA演算法之一，是SHA-1的后继者。其下又可再分为六个不同的演算法标准，包括了：SHA-224、SHA-256、SHA-384、SHA-512、SHA-512/224、SHA-512/256。<br>
                <br>SHA-256是SHA-2家族的一员，可以生成256位的散列值。目前没有对SHA-2家族有效的攻击手段。
            </div>
            <div id="sha384" class="display"><!--SHA-384函数-->
                <hr/>
                输入 <input name="sha384" type="text"> <input name="提交" type="submit" value="计算"> <input name="capital" type="checkbox" value="1"> 大写输出的文本<br>
                <b>SHA-2</b>，名称来自于安全散列演算法2（英语：<i>Secure Hash Algorithm 2</i>）的缩写，一种密码杂凑函数演算法标准，由美国国家安全局研发，由美国国家标准与技术研究院（NIST）在2001年发布。属于SHA演算法之一，是SHA-1的后继者。其下又可再分为六个不同的演算法标准，包括了：SHA-224、SHA-256、SHA-384、SHA-512、SHA-512/224、SHA-512/256。<br>
                <br>SHA-384是SHA-2家族的一员，可以生成384位的散列值。目前没有对SHA-2家族有效的攻击手段。
            </div>
            <div id="sha512" class="display"><!--SHA-512函数-->
                <hr/>
                输入 <input name="sha512" type="text"> <input name="提交" type="submit" value="计算"> <input name="capital" type="checkbox" value="1"> 大写输出的文本<br>
                <b>SHA-2</b>，名称来自于安全散列演算法2（英语：<i>Secure Hash Algorithm 2</i>）的缩写，一种密码杂凑函数演算法标准，由美国国家安全局研发，由美国国家标准与技术研究院（NIST）在2001年发布。属于SHA演算法之一，是SHA-1的后继者。其下又可再分为六个不同的演算法标准，包括了：SHA-224、SHA-256、SHA-384、SHA-512、SHA-512/224、SHA-512/256。<br>
                <br>SHA-512是SHA-2家族的一员，可以生成512位的散列值。目前没有对SHA-2家族有效的攻击手段。
            </div>
        </form>
    </body>
</html>
