@extends('layout')

@section('title', 'Latest Legal Articles - JustiCore')

@section('extra-css')
<style>
    body, html {
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .articles-hero {
        background: linear-gradient(135deg, #232526 0%, #003366 100%);
        padding: 80px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .articles-hero::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: url('/image/img.jpg') no-repeat center center/cover;
        opacity: 0.1;
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: bold;
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        background-size: 200% auto;
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        animation: gradientMove 3s linear infinite;
        margin-bottom: 20px;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
    }
    
    .hero-subtitle {
        font-size: 1.3rem;
        color: #e0e0e0;
        margin-bottom: 30px;
        line-height: 1.6;
    }
    
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }
    
    .articles-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 60px 20px;
    }
    
    .search-section {
        background: #232526;
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 40px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        border: 1px solid #333;
    }
    
    .search-box {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .search-input {
        flex: 1;
        padding: 15px;
        border: 2px solid #333;
        border-radius: 10px;
        background: #1a1a1a;
        color: white;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        outline: none;
        border-color: #00c6ff;
        box-shadow: 0 0 15px rgba(0,198,255,0.3);
    }
    
    .search-btn {
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: white;
        border: none;
        padding: 15px 25px;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,198,255,0.4);
    }
    
    .category-filters {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .category-btn {
        background: #1a1a1a;
        color: #e0e0e0;
        border: 1px solid #333;
        padding: 8px 16px;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }
    
    .category-btn.active,
    .category-btn:hover {
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: white;
        border-color: #00c6ff;
    }
    
    .featured-section {
        margin-bottom: 50px;
    }
    
    .section-title {
        font-size: 2rem;
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 30px;
        text-align: center;
    }
    
    .featured-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }
    
    .featured-article {
        background: #232526;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        border: 1px solid #333;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .featured-article::before {
        content: "FEATURED";
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(90deg, #ff512f, #dd2476);
        color: white;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: bold;
    }
    
    .featured-article:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,198,255,0.2);
        border-color: #00c6ff;
    }
    
    .article-category {
        color: #ff512f;
        font-size: 0.9rem;
        font-weight: bold;
        margin-bottom: 10px;
        text-transform: uppercase;
    }
    
    .article-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #00c6ff;
        margin-bottom: 15px;
        line-height: 1.4;
    }
    
    .article-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 15px;
        font-size: 0.9rem;
        color: #888;
    }
    
    .article-date {
        color: #ffd700;
    }
    
    .article-author {
        color: #00c6ff;
    }
    
    .article-summary {
        color: #e0e0e0;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    
    .read-more-btn {
        background: linear-gradient(90deg, #00c6ff, #ff512f, #dd2476);
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: bold;
        display: inline-block;
        transition: all 0.3s ease;
        animation: gradientMove 2s linear infinite;
    }
    
    .read-more-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,198,255,0.4);
        color: white;
    }
    
    .articles-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 25px;
    }
    
    .article-card {
        background: #232526;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.3);
        border: 1px solid #333;
        transition: all 0.3s ease;
    }
    
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,198,255,0.15);
        border-color: #00c6ff;
    }
    
    .article-card .article-title {
        font-size: 1.2rem;
        margin-bottom: 10px;
    }
    
    .article-card .article-summary {
        font-size: 0.95rem;
        margin-bottom: 15px;
    }
    
    .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 40px;
    }
    
    .page-btn {
        background: #1a1a1a;
        color: #e0e0e0;
        border: 1px solid #333;
        padding: 10px 15px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .page-btn.active,
    .page-btn:hover {
        background: linear-gradient(90deg, #00c6ff, #ff512f);
        color: white;
        border-color: #00c6ff;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        .featured-grid {
            grid-template-columns: 1fr;
        }
        .articles-grid {
            grid-template-columns: 1fr;
        }
        .search-box {
            flex-direction: column;
        }
        .category-filters {
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="articles-hero">
    <div class="hero-content">
        <h1 class="hero-title">Latest Legal Articles</h1>
        <p class="hero-subtitle">
            Stay updated with the latest legal developments, case studies, and expert insights<br>
            from our team of experienced lawyers in Karachi
        </p>
    </div>
</div>

<div class="articles-container">
    <!-- Search and Filter Section -->
    <div class="search-section">
        <div class="search-box">
            <input type="text" class="search-input" placeholder="Search articles by title, content, or keywords..." id="searchInput">
            <button class="search-btn" onclick="searchArticles()">Search</button>
        </div>
        <div class="category-filters">
            <button class="category-btn active" data-category="all">All Articles</button>
            <button class="category-btn" data-category="property">Property Law</button>
            <button class="category-btn" data-category="family">Family Law</button>
            <button class="category-btn" data-category="criminal">Criminal Law</button>
            <button class="category-btn" data-category="civil">Civil Law</button>
            <button class="category-btn" data-category="contract">Contract Law</button>
            <button class="category-btn" data-category="corporate">Corporate Law</button>
        </div>
    </div>

    <!-- Featured Articles Section -->
    <div class="featured-section">
        <h2 class="section-title">Featured Articles</h2>
        <div class="featured-grid">
            <div class="featured-article" data-category="property">
                <div class="article-category">Property Law</div>
                <h3 class="article-title">Landmark Supreme Court Decision on Property Rights in Karachi</h3>
                <div class="article-meta">
                    <span class="article-date">March 15, 2024</span>
                    <span class="article-author">By Usman Ahmed</span>
                </div>
                <p class="article-summary">
                    The Supreme Court of Pakistan delivered a groundbreaking verdict that strengthens property rights for Karachi residents. This landmark decision addresses long-standing issues of illegal occupation and provides clear guidelines for property dispute resolution. The ruling is expected to impact thousands of pending cases across the city.
                </p>
                <a href="#" class="read-more-btn">Read Full Article</a>
            </div>
            
            <div class="featured-article" data-category="family">
                <div class="article-category">Family Law</div>
                <h3 class="article-title">New Family Law Reforms: What Karachi Families Need to Know</h3>
                <div class="article-meta">
                    <span class="article-date">March 10, 2024</span>
                    <span class="article-author">By Ali Raza</span>
                </div>
                <p class="article-summary">
                    Recent reforms in Pakistan's family law system bring significant changes to divorce proceedings, child custody arrangements, and inheritance matters. This comprehensive guide explains how these changes affect families in Karachi and what steps they should take to protect their rights.
                </p>
                <a href="#" class="read-more-btn">Read Full Article</a>
            </div>
        </div>
    </div>

    <!-- All Articles Section -->
    <div class="articles-section">
        <h2 class="section-title">Latest Articles</h2>
        <div class="articles-grid">
            <div class="article-card" data-category="criminal">
                <div class="article-category">Criminal Law</div>
                <h3 class="article-title">High-Profile Criminal Case: Lessons in Legal Defense</h3>
                <div class="article-meta">
                    <span class="article-date">March 8, 2024</span>
                    <span class="article-author">By Sara Khan</span>
                </div>
                <p class="article-summary">
                    A recent high-profile criminal case in Karachi ended in acquittal, demonstrating the importance of proper legal representation and due process. This case study examines the defense strategies that led to a successful outcome.
                </p>
                <a href="#" class="read-more-btn">Read More</a>
            </div>
            
            <div class="article-card" data-category="civil">
                <div class="article-category">Civil Law</div>
                <h3 class="article-title">Tenant Rights Strengthened: New Protections for Renters</h3>
                <div class="article-meta">
                    <span class="article-date">March 5, 2024</span>
                    <span class="article-author">By Muzamil Hassan</span>
                </div>
                <p class="article-summary">
                    Karachi courts have issued new guidelines strengthening tenant rights and making eviction procedures more transparent. This development provides better protection for renters across the city.
                </p>
                <a href="#" class="read-more-btn">Read More</a>
            </div>
            
            <div class="article-card" data-category="contract">
                <div class="article-category">Contract Law</div>
                <h3 class="article-title">Digital Contracts: Legal Validity in Pakistan</h3>
                <div class="article-meta">
                    <span class="article-date">March 1, 2024</span>
                    <span class="article-author">By Tahir Mehmood</span>
                </div>
                <p class="article-summary">
                    With the rise of digital transactions, understanding the legal validity of electronic contracts is crucial. This article explores the current legal framework and best practices for digital agreements.
                </p>
                <a href="#" class="read-more-btn">Read More</a>
            </div>
            
            <div class="article-card" data-category="corporate">
                <div class="article-category">Corporate Law</div>
                <h3 class="article-title">Corporate Governance: New Regulations for Karachi Businesses</h3>
                <div class="article-meta">
                    <span class="article-date">February 28, 2024</span>
                    <span class="article-author">By Kamran Sheikh</span>
                </div>
                <p class="article-summary">
                    Recent changes in corporate governance regulations affect how businesses in Karachi operate. This guide explains the new requirements and compliance strategies for local companies.
                </p>
                <a href="#" class="read-more-btn">Read More</a>
            </div>
            
            <div class="article-card" data-category="property">
                <div class="article-category">Property Law</div>
                <h3 class="article-title">Commercial Property Disputes: Resolution Strategies</h3>
                <div class="article-meta">
                    <span class="article-date">February 25, 2024</span>
                    <span class="article-author">By Usman Ahmed</span>
                </div>
                <p class="article-summary">
                    Commercial property disputes can be complex and costly. This article outlines effective strategies for resolving such disputes and protecting your business interests.
                </p>
                <a href="#" class="read-more-btn">Read More</a>
            </div>
            
            <div class="article-card" data-category="family">
                <div class="article-category">Family Law</div>
                <h3 class="article-title">Child Custody: Understanding Your Rights</h3>
                <div class="article-meta">
                    <span class="article-date">February 22, 2024</span>
                    <span class="article-author">By Ali Raza</span>
                </div>
                <p class="article-summary">
                    Child custody cases require careful consideration of the child's best interests. This guide explains the legal framework and factors courts consider when making custody decisions.
                </p>
                <a href="#" class="read-more-btn">Read More</a>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <button class="page-btn active">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <button class="page-btn">Next →</button>
    </div>
</div>
@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Category filter functionality
    const categoryBtns = document.querySelectorAll('.category-btn');
    const articles = document.querySelectorAll('.article-card, .featured-article');
    
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            categoryBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const category = this.getAttribute('data-category');
            
            // Show/hide articles based on category
            articles.forEach(article => {
                if (category === 'all' || article.getAttribute('data-category') === category) {
                    article.style.display = 'block';
                    article.style.animation = 'fadeIn 0.5s ease';
                } else {
                    article.style.display = 'none';
                }
            });
        });
    });
    
    // Search functionality
    window.searchArticles = function() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        
        articles.forEach(article => {
            const title = article.querySelector('.article-title').textContent.toLowerCase();
            const summary = article.querySelector('.article-summary').textContent.toLowerCase();
            const category = article.querySelector('.article-category').textContent.toLowerCase();
            
            if (title.includes(searchTerm) || summary.includes(searchTerm) || category.includes(searchTerm)) {
                article.style.display = 'block';
                article.style.animation = 'fadeIn 0.5s ease';
            } else {
                article.style.display = 'none';
            }
        });
    };
    
    // Search on Enter key
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            searchArticles();
        }
    });
    
    // Pagination functionality
    const pageBtns = document.querySelectorAll('.page-btn');
    pageBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            pageBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            // Add pagination logic here
        });
    });
});

// Add fadeIn animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
</script>
@endsection 