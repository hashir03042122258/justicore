@extends('layout')

@section('title', $service->title)

@section('content')
<style>
     body {
        background: linear-gradient(135deg, #232526 0%, #414345 100%);
        background-attachment: fixed;
        background-size: cover;
    }
.service-container {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 60px 40px;
    max-width: 1000px;
    margin: 60px auto 0;
    gap: 40px;
    flex-wrap: wrap;
    background: #232526;
    border-radius: 18px;
    box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 1.5px 8px 0 rgba(0,198,255,0.08);
    animation: fadeInUp 0.8s ease-out;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(0, 198, 255, 0.1);
}

.service-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(0, 198, 255, 0.05) 50%, transparent 70%);
    animation: float 8s ease-in-out infinite;
    pointer-events: none;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

    .service-text {
        flex: 1;
        min-width: 300px;
        color: #fff;
        position: relative;
        z-index: 1;
    }

    .service-text h1 {
        color: #00c6ff;
        margin-bottom: 20px;
        font-size: 2rem;
        font-weight: bold;
        letter-spacing: 1px;
        background: linear-gradient(90deg, #00c6ff 0%, #00eaff 100%);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        text-shadow: 0 0 8px #00eaff, 0 0 18px #00c6ff;
        -webkit-text-stroke: 1px #00eaff;
        animation: fadeInUp 1s ease-out 0.3s both;
    }

    .service-text p {
        margin: 5px 0;
        color: #e0e0e0;
        font-size: 1.08rem;
        line-height: 1.6;
        position: relative;
        z-index: 1;
        animation: fadeInUp 1s ease-out 0.5s both;
    }

    .service-image {
        flex: 1;
        min-width: 250px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
        animation: fadeInUp 1s ease-out 0.7s both;
    }

    .service-image img {
        max-width: 100%;
        border-radius: 50%;
        box-shadow: 0 8px 32px rgba(0,198,255,0.2);
        transform: scale(1);
        transition: all 0.3s ease;
        width: 180px;
        height: 180px;
        object-fit: cover;
        border: 3px solid #00c6ff;
        position: relative;
    }

    .service-image img::before {
        content: '';
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border-radius: 50%;
        background: linear-gradient(45deg, #00c6ff, #ff512f, #dd2476);
        z-index: -1;
        animation: rotate 3s linear infinite;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .service-container:hover .service-image img {
        transform: scale(1.05);
        box-shadow: 0 12px 40px rgba(0,198,255,0.3);
        border-color: #ff512f;
    }

    .btn-hire {
        margin-top: 30px;
        display: inline-block;
        padding: 14px 36px;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        color: #fff;
        border-radius: 30px;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1rem;
        box-shadow: 0 4px 16px rgba(0,0,0,0.18);
        transition: all 0.3s ease;
        animation: gradientMove 2s linear infinite, pulse 2s ease-in-out infinite;
        border: none;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .btn-hire::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn-hire:hover::before {
        left: 100%;
    }

    .btn-hire:hover {
        background-position: 100% 0;
        transform: scale(1.05) translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 198, 255, 0.4);
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.02);
        }
    }

    #typedDescription {
        margin-top: 30px;
        line-height: 1.6;
        color: #e0e0e0;
        position: relative;
        z-index: 1;
    }
</style>

<div class="service-container">
    <!-- Left: Text -->
    <div class="service-text">
        <h1>{{ $service->title }}</h1>

        <p><strong>Lawyer:</strong> {{ $service->lawyer }}</p>
        <p><strong>Charges:</strong> Rs. {{ number_format($service->charges) }}</p>
        <p><strong>Total Cases Handled:</strong> {{ $service->cases }}</p>
        <p><strong>Win Rate:</strong> {{ $service->win_rate }}</p>

        <div id="typedDescription" style="margin-top: 30px;"></div>
@if(session()->has('user'))
    <a href="/meeting" class="btn-hire">Hire Now</a>
@else
    <a href="/register" class="btn-hire">Hire Now</a>
@endif




    </div>

    <!-- Right: Image -->
    <div class="service-image">
        <img src="{{ asset('image/' . $service->image) }}" alt="{{ $service->lawyer }}">
    </div>
</div>

<!-- Typing Animation Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById("typedDescription");
        const html = `{!! addslashes($service->description) !!}`;
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const nodes = Array.from(doc.body.childNodes);
        let index = 0;

        function typeNode(node, cb) {
            if (node.nodeType === Node.TEXT_NODE) {
                let text = node.textContent;
                let span = document.createElement("span");
                container.appendChild(span);
                let i = 0;
                (function typeChar() {
                    if (i < text.length) {
                        span.textContent += text.charAt(i++);
                        setTimeout(typeChar, 15);
                    } else {
                        cb();
                    }
                })();
            } else if (node.nodeType === Node.ELEMENT_NODE) {
                let el = document.createElement(node.tagName);
                for (let attr of node.attributes) {
                    el.setAttribute(attr.name, attr.value);
                }
                container.appendChild(el);
                typeChildren(Array.from(node.childNodes), el, cb);
            } else {
                cb();
            }
        }

        function typeChildren(children, parent, cb) {
            let i = 0;
            (function next() {
                if (i < children.length) {
                    typeNode(children[i++], next.bind(null));
                } else {
                    cb();
                }
            })();
        }

        (function nextNode() {
            if (index < nodes.length) {
                typeNode(nodes[index++], nextNode);
            }
        })();
    });
</script>
@endsection
