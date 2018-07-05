<!DOCTYPE html>
<html>
<head>
    <title>Trả lời phản hồi</title>
</head>

<body>
<p><span style="color: #2672ec">{{ $feedback->name }}</span> thân mến, chúng tôi xin trả lời về vấn đề của bạn như sau:
</p>
<p>Q: <span style="color: #9f191f">{{ $feedback->content }}</span></p>
<p>A: <span style="color: #2ca02c">{{ $feedback->feedback }}</span></p>
</body>

</html>