@extends('layout')

@section('title', 'Our Lawyers')

@section('extra-css')
<style>
    body, html {
        background: linear-gradient(135deg, #232526 0%, #414345 100%);
    }
    .lawyers-section {
        max-width: 1200px;
        margin: 60px auto 40px auto;
        padding: 0 20px;
        animation: fadeInUp 0.8s ease-out;
    }
    .lawyers-section h2 {
        text-align: center;
        color: #fff;
        font-size: 2.3rem;
        font-weight: bold;
        margin-bottom: 40px;
        text-shadow: 0 0 20px rgba(0, 198, 255, 0.3);
        animation: fadeInUp 1s ease-out 0.2s both;
    }
    .lawyers-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 32px;
    }
    .lawyer-card {
        background: rgba(30, 30, 40, 0.98);
        border-radius: 18px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
        padding: 32px 24px 24px 24px;
        text-align: center;
        color: #fff;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        animation: fadeInUp 0.8s ease-out;
        border: 1px solid rgba(0, 198, 255, 0.1);
    }
    .lawyer-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 198, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }
    .lawyer-card:hover::before {
        left: 100%;
    }
    .lawyer-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 16px 48px 0 rgba(0, 198, 255, 0.2);
        border-color: #00c6ff;
    }
    .lawyer-pic {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #00c6ff;
        margin-bottom: 16px;
        background: #eee;
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
    }
    .lawyer-card:hover .lawyer-pic {
        transform: scale(1.05);
        box-shadow: 0 0 25px rgba(0, 198, 255, 0.5);
        border-color: #ff512f;
    }
    .lawyer-name {
        font-size: 1.3rem;
        font-weight: bold;
        margin-bottom: 6px;
        color: #00c6ff;
        text-shadow: 0 0 10px rgba(0, 198, 255, 0.3);
        position: relative;
        z-index: 1;
    }
    .lawyer-info {
        font-size: 1.05rem;
        color: #ccc;
        margin-bottom: 12px;
        line-height: 1.5;
        position: relative;
        z-index: 1;
    }
    .star-rating {
        margin: 10px 0 16px 0;
        position: relative;
        z-index: 1;
    }
    .star-rating i {
        font-size: 1.5rem;
        color: #ffd700;
        cursor: pointer;
        transition: all 0.3s ease;
        margin: 0 2px;
    }
    .star-rating i:hover, .star-rating i.selected {
        color: #ffb300;
        transform: scale(1.2) rotate(5deg);
        text-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
    }
    .feedback-form {
        position: relative;
        z-index: 1;
    }
    .feedback-form textarea {
        width: 100%;
        min-height: 48px;
        border-radius: 10px;
        border: 1px solid rgba(0, 198, 255, 0.2);
        background: #232526;
        color: #fff;
        font-size: 1rem;
        padding: 10px 14px;
        margin-bottom: 10px;
        resize: vertical;
        transition: all 0.3s ease;
    }
    .feedback-form textarea:focus {
        outline: none;
        border-color: #00c6ff;
        box-shadow: 0 0 15px rgba(0, 198, 255, 0.3);
        transform: scale(1.02);
    }
    .feedback-form button {
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: #fff;
        border: none;
        border-radius: 20px;
        padding: 8px 28px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .feedback-form button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    .feedback-form button:hover::before {
        left: 100%;
    }
    .feedback-form button:hover {
        background: linear-gradient(90deg, #ff512f, #00c6ff);
        transform: scale(1.05) translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 198, 255, 0.4);
    }
    .comments-section {
        margin-top: 18px;
        text-align: left;
        position: relative;
        z-index: 1;
    }
    .comment {
        background: #232526;
        border-radius: 10px;
        padding: 10px 14px;
        margin-bottom: 10px;
        color: #fff;
        font-size: 0.98rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        position: relative;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 198, 255, 0.1);
        animation: fadeInUp 0.5s ease-out;
    }
    .comment:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 15px rgba(0, 198, 255, 0.1);
        border-color: rgba(0, 198, 255, 0.3);
    }
    .comment .comment-user {
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 2px;
        display: block;
        text-shadow: 0 0 8px rgba(0, 198, 255, 0.3);
    }
    .comment .delete-btn {
        position: absolute;
        top: 8px;
        right: 8px;
        background: #ff512f;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        font-size: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        opacity: 0.7;
    }
    .comment .delete-btn:hover {
        background: #ff0000;
        transform: scale(1.1) rotate(90deg);
        opacity: 1;
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
    }
    .comment.deleting {
        transform: translateX(100%);
        opacity: 0;
    }
</style>
@endsection

@section('content')
<div class="lawyers-section">
    <h2 style="text-align:center; color:#fff; font-size:2.3rem; font-weight:bold; margin-bottom:40px;">Meet Our Lawyers</h2>
    <div class="lawyers-grid">
        @php
        $lawyers = [
            [
                'name' => 'Usman Ahmed',
                'image' => 'usman.png',
                'info' => 'Expert in Civil & Criminal Law, 12+ years experience, LLB Gold Medalist',
                'comments' => [
                    ['user' => 'Ali Raza', 'text' => 'Very professional and helpful!'],
                    ['user' => 'Sara Khan', 'text' => 'Solved my case quickly. Highly recommended!'],
                ],
            ],
            [
                'name' => 'Muzamil Hassan',
                'image' => 'muzamilhassan.png',
                'info' => 'Family & Property Law Specialist, 10+ years experience, LLM',
                'comments' => [
                    ['user' => 'Kamran Sheikh', 'text' => 'Great advice and support.'],
                    ['user' => 'Fatima Noor', 'text' => 'Very knowledgeable and kind.'],
                ],
            ],
            [
                'name' => 'Ali Raza',
                'image' => 'aliraza.jpeg',
                'info' => 'Criminal Defense, 8+ years experience, LLB',
                'comments' => [
                    ['user' => 'Usman Ahmed', 'text' => 'Best criminal lawyer in Karachi!'],
                    ['user' => 'Ayesha Siddiqui', 'text' => 'Explained everything clearly.'],
                ],
            ],
            [
                'name' => 'Sara Khan',
                'image' => 'sara.png',
                'info' => 'Women & Child Rights, 9+ years experience, LLM',
                'comments' => [
                    ['user' => 'Muzamil Hassan', 'text' => 'Very supportive and understanding.'],
                    ['user' => 'Bilal Qureshi', 'text' => 'Helped my family a lot.'],
                ],
            ],
            [
                'name' => 'Kamran Sheikh',
                'image' => 'kamran.jpeg',
                'info' => 'Property & Business Law, 11+ years experience, LLB',
                'comments' => [
                    ['user' => 'Ali Raza', 'text' => 'Solved my property dispute fast!'],
                    ['user' => 'Hina Mir', 'text' => 'Very honest and reliable.'],
                ],
            ],
            [
                'name' => 'Tahir Mehmood',
                'image' => 'tahir.png',
                'info' => 'Contract & Corporate Law, 7+ years experience, LLM',
                'comments' => [
                    ['user' => 'Sara Khan', 'text' => 'Drafted my contract perfectly.'],
                    ['user' => 'Zainab Ali', 'text' => 'Very detail-oriented and smart.'],
                ],
            ],
        ];
        @endphp
        @foreach ($lawyers as $index => $lawyer)
        <div class="lawyer-card" data-lawyer="{{ $index }}">
            <img src="/image/{{ $lawyer['image'] }}" class="lawyer-pic" alt="{{ $lawyer['name'] }}">
            <div class="lawyer-name">{{ $lawyer['name'] }}</div>
            <div class="lawyer-info">{{ $lawyer['info'] }}</div>
            <div class="star-rating" data-lawyer="{{ $index }}">
                @for ($i = 1; $i <= 6; $i++)
                    <i class="fa fa-star" data-star="{{ $i }}"></i>
                @endfor
            </div>
            <form class="feedback-form" onsubmit="return false;">
                <textarea placeholder="Leave your feedback..."></textarea>
                <button type="submit">Submit</button>
            </form>
            <div class="comments-section">
                @foreach ($lawyer['comments'] as $comment)
                    <div class="comment">
                        <span class="comment-user">{{ $comment['user'] }}</span>
                        {{ $comment['text'] }}
                        <button class="delete-btn" onclick="deleteComment(this)">×</button>
                    </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('extra-js')
<script>
// Star rating UI
const cards = document.querySelectorAll('.lawyer-card');
cards.forEach(card => {
    const stars = card.querySelectorAll('.fa-star');
    stars.forEach((star, idx) => {
        star.addEventListener('mouseenter', () => {
            for (let i = 0; i <= idx; i++) stars[i].classList.add('selected');
        });
        star.addEventListener('mouseleave', () => {
            stars.forEach(s => s.classList.remove('selected'));
        });
        star.addEventListener('click', () => {
            stars.forEach(s => s.classList.remove('selected'));
            for (let i = 0; i <= idx; i++) stars[i].classList.add('selected');
            alert('Thank you for rating this lawyer!');
        });
    });
    // Feedback form
    const form = card.querySelector('.feedback-form');
    form.addEventListener('submit', function() {
        const textarea = form.querySelector('textarea');
        if (textarea.value.trim()) {
            const commentsSection = card.querySelector('.comments-section');
            const commentDiv = document.createElement('div');
            commentDiv.className = 'comment';
            commentDiv.innerHTML = `
                <span class='comment-user'>You</span>
                ${textarea.value}
                <button class="delete-btn" onclick="deleteComment(this)">×</button>
            `;
            commentsSection.prepend(commentDiv);
            textarea.value = '';
        }
    });
});

// Delete functionality for existing comments
const comments = document.querySelectorAll('.comment');
comments.forEach(comment => {
    const deleteBtn = comment.querySelector('.delete-btn');
    if (deleteBtn) {
        deleteBtn.addEventListener('click', function() {
            deleteComment(this);
        });
    }
});

// Global delete function
function deleteComment(deleteBtn) {
    const commentDiv = deleteBtn.parentNode;
    const commentText = commentDiv.querySelector('.comment-user').nextElementSibling.textContent.trim();
    
    if (confirm(`Are you sure you want to delete the comment: "${commentText}"?`)) {
        commentDiv.classList.add('deleting');
        setTimeout(() => {
            commentDiv.remove();
        }, 300);
    }
}
</script>
@endsection 