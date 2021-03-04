<script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
<script type="text/x-mathjax-config">
 MathJax.Hub.Config({
 tex2jax: {
 inlineMath: [['$', '$'] ],
 displayMath: [ ['$$','$$'], ["\\[","\\]"] ]
 }
 });
</script>

# 回答

- 2分探索法を用いて年齢当てゲームを行った場合、1回質問するだけで正しい年齢が存在する範囲が半分になる。

- つまり、n回質問する度に正しい年齢が存在する範囲が2のn乗に反比例して減少する。

- 質問回数をn、正しい年齢が存在する範囲中の最大値と最小値の差をdとおくと、以下のような式で表せる。


$$ \log_2 d = n \\ $$


- したがって、正しい年齢が存在する範囲が0歳から100歳の場合、7回以上の質問をすることで正しい年齢を当てることができる。