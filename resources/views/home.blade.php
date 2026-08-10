<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopZone Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg: #06060d;
            --bg-soft: #0b0b17;
            --surface: rgba(255, 255, 255, .045);
            --surface-strong: rgba(255, 255, 255, .07);
            --border: rgba(255, 255, 255, .09);
            --border-strong: rgba(255, 255, 255, .18);
            --text: #f1f5f9;
            --text-dim: #93a0b8;
            --violet: #8b5cf6;
            --blue: #3b82f6;
            --amber: #fbbf24;
            --grad: linear-gradient(90deg, #7c3aed, #2563eb);
            --grad-soft: linear-gradient(135deg, rgba(124, 58, 237, .18), rgba(37, 99, 235, .12));
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            position: relative;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Space Grotesk', 'Inter', sans-serif;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            position: relative;
            z-index: 2;
        }

        a {
            color: inherit;
        }

        .error-from-google {
            position: fixed;
            top: 83px;
            right: 20px;
            padding: 10px 100px !important;
            min-width: 30%;
            height: 40px;
            white-space: nowrap;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 900;
            margin: auto;
            border-radius: 10px;
            animation: shadow 0.5s linear infinite;
            z-index: 60;
        }

        @keyframes shadow {
            50% {
                box-shadow: 0 0 0 5px rgba(215, 14, 14, 0.439);
            }
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 16px;
            border-radius: 999px;
            background: var(--surface);
            border: 1px solid var(--border);
            color: #c4b5fd;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .eyebrow .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--violet);
            box-shadow: 0 0 8px 2px var(--violet);
        }

        .section-head {
            text-align: center;
            margin-bottom: 55px;
        }

        .section-head h2 {
            font-size: 40px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .section-head p {
            color: var(--text-dim);
            font-size: 17px;
            margin-top: 12px;
        }

        #main-header {
            position: fixed;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            width: 92%;
            max-width: 1180px;
            z-index: 50;
            border-radius: 999px;
            background: rgba(10, 10, 20, .55);
            border: 1px solid var(--border-strong);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, .35);
            transition: all .35s ease;
        }

        #main-header.scrolled {
            top: 10px;
            background: rgba(8, 8, 16, .82);
            box-shadow: 0 15px 45px rgba(0, 0, 0, .5);
        }

        #main-header .header-inner {
            padding: 14px 28px;
        }

        #main-header.scrolled .header-inner {
            padding: 10px 28px;
        }

        #main-header .logo-text {
            font-family: 'Space Grotesk', sans-serif;
            background: linear-gradient(90deg, #a78bfa, #60a5fa, #a78bfa);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            animation: gradientShift 4s linear infinite;
            color: transparent;
        }

        #main-header .logo-text span {
            color: #fff !important;
        }

        @keyframes gradientShift {
            to {
                background-position: 200% center;
            }
        }

        .nav-link {
            position: relative;
            padding: 8px 4px;
            color: #e2e8f0;
            font-size: 15px;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 4px;
            bottom: 0;
            width: 0%;
            height: 2px;
            background: var(--grad);
            transition: width .3s ease;
            border-radius: 2px;
        }

        .nav-link:hover {
            color: #fff;
        }

        .nav-link:hover::after {
            width: calc(100% - 8px);
        }

        .nav-cta-register {
            color: #cbd5e1 !important;
        }

        .nav-cta-login {
            background: var(--grad) !important;
            box-shadow: 0 6px 18px rgba(124, 58, 237, .35);
        }

        .cart-icon-wrap i {
            color: #a78bfa !important;
        }

        @keyframes bounceCart {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            25% {
                transform: translateY(-4px) rotate(-8deg);
            }

            75% {
                transform: translateY(-4px) rotate(8deg);
            }
        }

        @keyframes badgePulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(239, 68, 68, .6);
            }

            50% {
                transform: scale(1.15);
                box-shadow: 0 0 0 6px rgba(239, 68, 68, 0);
            }
        }

        .cart-icon-wrap:hover i {
            animation: bounceCart .5s ease;
        }

        .cart-badge {
            animation: badgePulse 2s ease-in-out infinite;
        }

        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height .4s ease;
            border-radius: 0 0 24px 24px;
        }

        .mobile-menu.open {
            max-height: 400px;
        }

        .hamburger span {
            display: block;
            width: 22px;
            height: 2px;
            background: #fff;
            margin: 5px 0;
            transition: all .3s ease;
        }

        .hamburger.open span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        .hamburger.open span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.open span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        .hero-3d {
            position: relative;
            height: 100vh;
            min-height: 640px;
            overflow: hidden;
            background: radial-gradient(ellipse at 50% 20%, #1b1140 0%, #0a0a17 60%, #05050c 100%);
            display: flex;
            align-items: center;
        }

        .hero-3d canvas {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            display: block;
        }

        .hero-3d .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(5, 5, 12, .15) 0%, rgba(5, 5, 12, .55) 75%, var(--bg) 100%);
            pointer-events: none;
        }

        .hero-3d .hero-content {
            position: relative;
            z-index: 5;
        }

        .hero-3d h2 {
            font-size: 68px;
            line-height: 1.05;
            font-weight: 800;
            color: #fff;
            letter-spacing: -1px;
        }

        .hero-3d h2 .grad {
            background: linear-gradient(90deg, #a78bfa, #60a5fa, #a78bfa);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradientShift 4s linear infinite;
        }

        .hero-3d p.lead {
            color: #cbd5e1;
            font-size: 19px;
            max-width: 520px;
        }

        .hero-cta-row {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            align-items: center;
        }

        .hero-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 34px;
            border-radius: 999px;
            background: var(--grad);
            color: white;
            font-weight: 700;
            font-size: 16px;
            text-decoration: none;
            box-shadow: 0 15px 35px rgba(124, 58, 237, .35);
            transition: .3s;
        }

        .hero-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, .5);
        }

        .hero-btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 30px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, .3);
            color: white;
            font-weight: 600;
            font-size: 16px;
            text-decoration: none;
            transition: .3s;
        }

        .hero-btn-ghost:hover {
            background: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .5);
        }

        .hero-scroll-hint {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: #94a3b8;
            font-size: 12px;
            letter-spacing: .1em;
            text-transform: uppercase;
            z-index: 5;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .hero-scroll-hint i {
            animation: scrollBounce 1.8s ease-in-out infinite;
        }

        @keyframes scrollBounce {

            0%,
            100% {
                transform: translateY(0);
                opacity: .5;
            }

            50% {
                transform: translateY(8px);
                opacity: 1;
            }
        }

        @media(max-width:768px) {
            .hero-3d h2 {
                font-size: 40px;
            }

            .hero-3d p.lead {
                font-size: 16px;
            }
        }

        .glow-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            pointer-events: none;
            z-index: 0;
            opacity: .35;
        }

        .brands {
            padding: 50px 0;
            background: var(--bg-soft);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            position: relative;
        }

        .brands-track {
            display: flex;
            gap: 60px;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .brands-track span {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #3b3b52;
            letter-spacing: 1px;
            transition: color .3s;
        }

        .brands-track span:hover {
            color: #8b5cf6;
        }

        .categories {
            padding: 100px 0;
            background: var(--bg);
            position: relative;
            overflow: hidden;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .glass-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 22px;
            transition: .35s;
            backdrop-filter: blur(6px);
        }

        .category {
            padding: 38px 28px;
            text-align: center;
        }

        .category:hover {
            background: var(--surface-strong);
            border-color: rgba(139, 92, 246, .45);
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(124, 58, 237, .18);
        }

        .category .icon-circle {
            width: 68px;
            height: 68px;
            margin: 0 auto;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--grad-soft);
            border: 1px solid var(--border-strong);
        }

        .category i {
            font-size: 28px;
            background: var(--grad);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .category h3 {
            margin-top: 22px;
            font-size: 21px;
            font-weight: 700;
        }

        .category p {
            color: var(--text-dim);
            margin-top: 8px;
            font-size: 14px;
        }

        .stats {
            background: linear-gradient(120deg, #2a1065 0%, #1e3a8a 100%);
            color: white;
            padding: 70px 0;
            position: relative;
            overflow: hidden;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            text-align: center;
        }

        .stats-grid h3 {
            font-size: 44px;
            font-weight: 800;
            background: linear-gradient(90deg, #fff, #c4b5fd);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .stats-grid p {
            color: #cbd5e1;
            margin-top: 8px;
            font-size: 14px;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .flash-sale {
            padding: 100px 0;
            background: var(--bg-soft);
            position: relative;
            overflow: hidden;
        }

        .flash-sale h2 {
            font-size: 46px;
            font-weight: 800;
        }

        .flash-sale p.lead {
            font-size: 18px;
            color: var(--text-dim);
        }

        .countdown-chip {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 18px 22px;
            text-align: center;
            min-width: 78px;
        }

        .countdown-chip h4 {
            font-size: 28px;
            font-weight: 800;
            background: var(--grad);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .countdown-chip span {
            color: var(--text-dim);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .06em;
        }

        .flash-sale .art-frame {
            border-radius: 26px;
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: 0 25px 60px rgba(0, 0, 0, .5);
        }

        .flash-sale .art-frame img {
            width: 100%;
            display: block;
        }

        .products {
            padding: 100px 0;
            background: var(--bg);
            position: relative;
            overflow: hidden;
        }

        .view-more-wrap {
            text-align: center;
            margin-bottom: 50px;
        }

        .view-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 38px;
            border-radius: 999px;
            background: var(--grad);
            color: white;
            font-weight: 700;
            font-size: 16px;
            text-decoration: none;
            box-shadow: 0 10px 25px rgba(37, 99, 235, .3);
            transition: .3s;
        }

        .view-more-btn i {
            transition: transform .3s ease;
        }

        .view-more-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(37, 99, 235, .4);
        }

        .view-more-btn:hover i {
            transform: translateX(5px);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .product-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 18px;
            overflow: hidden;
            transition: .35s;
            backdrop-filter: blur(6px);
        }

        .product-card:hover {
            transform: translateY(-8px);
            border-color: rgba(139, 92, 246, .5);
            box-shadow: 0 25px 50px rgba(124, 58, 237, .22);
        }

        .product-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 16px;
            transition: transform .35s ease;
        }

        .product-card:hover img {
            transform: scale(1.06);
        }

        .product-card h3 {
            font-size: 20px;
            font-weight: 700;
            margin: 16px 0 6px;
        }

        .product-card p {
            color: var(--text-dim);
            font-size: 14px;
            line-height: 1.6;
        }

        .product-card span {
            display: block;
            color: var(--amber);
            font-size: 24px;
            font-weight: 800;
            margin: 14px 0;
            font-family: 'Space Grotesk', sans-serif;
        }

        .product-card button {
            width: 100%;
            padding: 12px;
            background: transparent;
            color: #fff;
            border: 1px solid var(--border-strong);
            border-radius: 12px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            transition: .25s;
        }

        .product-card button:hover {
            background: var(--grad);
            border-color: transparent;
        }

        .offer {
            height: 380px;
            position: relative;
            background:
                linear-gradient(rgba(6, 6, 13, .55), rgba(30, 16, 80, .75)),
                url("https://images.unsplash.com/photo-1607082349566-187342175e2f") center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .offer-content h2 {
            font-size: 50px;
            font-weight: 800;
        }

        .offer-content p {
            font-size: 20px;
            margin: 18px 0 26px;
            color: #dbe3f5;
        }

        .offer-content button {
            padding: 15px 42px;
            border: none;
            border-radius: 999px;
            background: var(--grad);
            color: white;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 15px 35px rgba(124, 58, 237, .4);
        }

        .why-us {
            background: var(--bg-soft);
            padding: 100px 0;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .feature {
            padding: 36px;
        }

        .feature .icon-circle {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--grad-soft);
            border: 1px solid var(--border-strong);
            margin-bottom: 20px;
        }

        .feature i {
            font-size: 22px;
            background: var(--grad);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .feature h3 {
            font-size: 21px;
            margin-bottom: 12px;
            font-weight: 700;
        }

        .feature p {
            color: var(--text-dim);
            line-height: 1.6;
        }

        .feature:hover {
            border-color: rgba(139, 92, 246, .4);
            transform: translateY(-6px);
        }

        .reviews {
            padding: 100px 0;
            background: var(--bg);
        }

        .review-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .review {
            padding: 34px;
            text-align: center;
        }

        .review:hover {
            border-color: rgba(251, 191, 36, .35);
            transform: translateY(-6px);
        }

        .review .stars {
            color: var(--amber);
            letter-spacing: 3px;
            margin-bottom: 16px;
        }

        .review p {
            font-size: 16px;
            color: #d7dee9;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .review h4 {
            color: #a78bfa;
            font-size: 15px;
            font-weight: 700;
        }

        .blog {
            padding: 100px 0;
            background: var(--bg-soft);
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .blog-card {
            border-radius: 22px;
            overflow: hidden;
            transition: .35s;
        }

        .blog-card:hover {
            transform: translateY(-8px);
            border-color: rgba(139, 92, 246, .4);
        }

        .blog-card img {
            width: 100%;
            height: 190px;
            object-fit: cover;
            display: block;
        }

        .blog-card-content {
            padding: 22px;
        }

        .blog-card-content span {
            display: inline-block;
            color: #a78bfa;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .08em;
            background: var(--grad-soft);
            border: 1px solid var(--border-strong);
            padding: 4px 12px;
            border-radius: 999px;
        }

        .blog-card-content h3 {
            margin: 14px 0 8px;
            font-size: 19px;
            font-weight: 700;
        }

        .blog-card-content p {
            color: var(--text-dim);
            font-size: 14px;
            line-height: 1.6;
        }

        .app-promo {
            padding: 100px 0;
            background: var(--bg);
        }

        .app-promo-inner {
            background: var(--grad);
            border-radius: 30px;
            padding: 60px;
            color: white;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 30px;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .app-promo-inner h2 {
            font-size: 38px;
            font-weight: 800;
        }

        .app-promo-inner img {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, .3);
            position: relative;
            z-index: 1;
        }

        .app-buttons {
            display: flex;
            gap: 15px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .app-buttons a {
            background: rgba(0, 0, 0, .35);
            border: 1px solid rgba(255, 255, 255, .25);
            color: white;
            padding: 12px 22px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .faq-section {
            padding: 100px 0;
            background: var(--bg-soft);
        }

        .faq-item {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px 28px;
            margin-bottom: 16px;
            cursor: pointer;
            transition: border-color .25s;
        }

        .faq-item:hover {
            border-color: rgba(139, 92, 246, .35);
        }

        .faq-item h4 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 17px;
            font-weight: 600;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height .3s ease;
            color: var(--text-dim);
            margin-top: 10px;
            line-height: 1.7;
            font-size: 15px;
        }

        .faq-item.open .faq-answer {
            max-height: 200px;
        }

        .faq-item.open i {
            transform: rotate(180deg);
            color: #a78bfa;
        }

        .faq-item i {
            transition: transform .3s ease;
        }

        .instagram-feed {
            padding: 100px 0;
            background: var(--bg);
        }

        .insta-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 14px;
        }

        .insta-grid a {
            display: block;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .insta-grid img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            display: block;
            transition: .35s;
        }

        .insta-grid a:hover img {
            transform: scale(1.08);
            filter: brightness(.75);
        }

        .newsletter {
            padding: 80px 0;
            background: var(--bg-soft);
            color: white;
            text-align: center;
            border-top: 1px solid var(--border);
        }

        .newsletter h2 {
            font-size: 34px;
            font-weight: 800;
        }

        .newsletter p {
            color: var(--text-dim);
            margin-top: 10px;
        }

        .newsletter form {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 28px;
            flex-wrap: wrap;
        }

        .newsletter input {
            padding: 15px 22px;
            border-radius: 999px;
            border: 1px solid var(--border-strong);
            background: var(--surface);
            color: white;
            width: 320px;
            max-width: 80vw;
        }

        .newsletter input::placeholder {
            color: var(--text-dim);
        }

        .newsletter button {
            padding: 15px 32px;
            border-radius: 999px;
            border: none;
            background: var(--grad);
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        .footer {
            background: #030308;
            color: white;
            padding-top: 70px;
            border-top: 1px solid var(--border);
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
        }

        .footer-box h3 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #a78bfa;
            font-weight: 700;
        }

        .footer-box p {
            color: var(--text-dim);
            line-height: 1.8;
            font-size: 15px;
        }

        .footer-box ul {
            list-style: none;
        }

        .footer-box li {
            margin-bottom: 12px;
        }

        .footer-box a {
            color: var(--text-dim);
            text-decoration: none;
            transition: .3s;
            font-size: 15px;
        }

        .footer-box a:hover {
            color: #a78bfa;
        }

        .social {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .social a {
            background: var(--surface);
            border: 1px solid var(--border-strong);
            width: 38px;
            height: 38px;
            border-radius: 999px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .social a:hover {
            background: var(--grad);
            border-color: transparent;
        }

        .footer-bottom {
            margin-top: 50px;
            padding: 20px;
            text-align: center;
            border-top: 1px solid var(--border);
            color: #64748b;
            font-size: 14px;
        }

        @media(max-width:1000px) {

            .product-grid,
            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .app-promo-inner {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .app-buttons {
                justify-content: center;
            }
        }

        @media(max-width:600px) {

            .product-grid,
            .category-grid,
            .features,
            .review-grid,
            .blog-grid,
            .footer-container {
                grid-template-columns: 1fr;
            }

            .insta-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .offer-content h2 {
                font-size: 36px;
            }

            .flash-sale h2 {
                font-size: 34px;
            }
        }

        .reveal {
            opacity: 0;
            transform: translateY(35px);
            transition: opacity .7s ease, transform .7s ease;
            will-change: opacity, transform;
        }

        .reveal.in-view {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-stagger>* {
            opacity: 0;
            transform: translateY(35px);
            transition: opacity .6s ease, transform .6s ease;
        }

        .reveal-stagger.in-view>* {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-stagger.in-view>*:nth-child(1) {
            transition-delay: .05s;
        }

        .reveal-stagger.in-view>*:nth-child(2) {
            transition-delay: .12s;
        }

        .reveal-stagger.in-view>*:nth-child(3) {
            transition-delay: .19s;
        }

        .reveal-stagger.in-view>*:nth-child(4) {
            transition-delay: .26s;
        }

        .reveal-stagger.in-view>*:nth-child(5) {
            transition-delay: .33s;
        }

        .reveal-stagger.in-view>*:nth-child(6) {
            transition-delay: .4s;
        }

        @media (prefers-reduced-motion: reduce) {

            .reveal,
            .reveal-stagger>* {
                transition: none !important;
                opacity: 1 !important;
                transform: none !important;
            }
        }
    </style>

    <script>
        let item_error = document.querySelector('.error-from-google');

        if (item_error) {
            setTimeout(() => {
                item_error.style.display = 'none';
            }, 3000);
        }

        window.addEventListener('scroll', () => {
            const header = document.getElementById('main-header');
            if (header) {
                header.classList.toggle('scrolled', window.scrollY > 40);
            }
        });

        function toggleMobileMenu() {
            document.getElementById('mobileMenu').classList.toggle('open');
            document.getElementById('hamburgerBtn').classList.toggle('open');
        }

        function toggleFaq(el) {
            el.classList.toggle('open');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const revealEls = document.querySelectorAll('.reveal, .reveal-stagger');
            if (!('IntersectionObserver' in window) || revealEls.length === 0) {
                revealEls.forEach(el => el.classList.add('in-view'));
                return;
            }
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -60px 0px'
            });
            revealEls.forEach(el => observer.observe(el));
        });
    </script>
</head>

<body>
    <header id="main-header">
        <div class="header-inner flex justify-between items-center">
            <h1 class="text-2xl font-bold logo-text">
                Shop<span>Zone</span>
            </h1>
            <nav class="hidden md:flex gap-8 font-medium">
                <a href="{{ route('home') }}" class="nav-link">
                    Home
                </a>
                <a href="{{ route('products.index') }}" class="nav-link">
                    Products
                </a>
                <a href="#categories" class="nav-link">
                    Categories
                </a>
                <a href="#contact" class="nav-link">
                    Contact
                </a>
            </nav>
            <div class="flex items-center gap-5 text-xl">
                @guest
                    <a href="{{ route('register') }}" class="nav-cta-register hidden sm:inline text-sm font-semibold">
                        Register
                    </a>
                    <a href="{{ route('login') }}"
                        class="nav-cta-login hidden sm:inline text-sm font-semibold text-white px-5 py-2 rounded-full">
                        Log In
                    </a>
                @endguest
                @auth
                    <a href="{{ route('profile') }}">
                        <i class="fa-solid fa-user cursor-pointer text-white"></i>
                    </a>
                    <a href="{{ route('logged_out') }}"
                        class="hidden sm:inline text-sm font-semibold bg-red-600 text-white px-5 py-2 rounded-xl hover:bg-red-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </a>
                @endAuth
                <button id="hamburgerBtn" class="hamburger md:hidden" onclick="toggleMobileMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
        <div id="mobileMenu" class="mobile-menu md:hidden">
            <nav class="flex flex-col px-6 py-4 gap-4 font-medium">
                <a href="{{ route('home') }}" class="text-gray-200 hover:text-white">Home</a>
                <a href="{{ route('products.index') }}" class="text-gray-200 hover:text-white">Products</a>
                <a href="#categories" class="text-gray-200 hover:text-white">Categories</a>
                <a href="#contact" class="text-gray-200 hover:text-white">Contact</a>
                @guest
                    <a href="{{ route('register') }}" class="text-gray-200 hover:text-white">Register</a>
                    <a href="{{ route('login') }}" class="nav-cta-login text-white px-5 py-2 rounded-full text-center">Log
                        In</a>
                @endguest
                @auth
                    <a href="{{ route('logged_out') }}"
                        class="bg-red-600 text-white px-5 py-2 rounded-full text-center">Log out</a>
                @endauth
            </nav>
        </div>
    </header>

    <section class="hero-3d">
        <canvas id="hero-canvas"></canvas>
        <div class="hero-overlay"></div>
        <div class="hero-content container mx-auto px-6">
            <div class="max-w-xl">
                <span class="eyebrow" id="hero-eyebrow"><span class="dot"></span> New Season Drop</span>
                <h2 class="mt-2" id="hero-title">
                    Discover<br>
                    <span class="grad">Amazing Products</span>
                </h2>
                <p class="lead mt-6" id="hero-lead">
                    Shop the latest trends with the best prices.
                    Premium quality products delivered to your door.
                </p>
                <div class="hero-cta-row mt-9" id="hero-ctas">
                    <a href="{{ route('products.index') }}" class="hero-btn-primary">
                        Shop Now <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="#categories" class="hero-btn-ghost">
                        Browse Categories
                    </a>
                </div>
                @session('success')
                    <span
                        class="inline-block mt-8 bg-blue-600 px-10 py-4 rounded-full text-lg text-white">{{ session('success') }}</span>
                @endsession
            </div>
        </div>
        <div class="hero-scroll-hint">
            Scroll
            <i class="fa-solid fa-chevron-down"></i>
        </div>
    </section>

    <script>
        (function() {
            const canvas = document.getElementById('hero-canvas');
            if (!canvas || typeof THREE === 'undefined') return;

            const heroSection = canvas.closest('.hero-3d');
            let width = heroSection.clientWidth;
            let height = heroSection.clientHeight;

            const renderer = new THREE.WebGLRenderer({
                canvas,
                antialias: true,
                alpha: true
            });
            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
            renderer.setSize(width, height);

            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 100);
            camera.position.set(0, 0, 9);

            scene.add(new THREE.AmbientLight(0xffffff, 0.55));
            const key = new THREE.PointLight(0xa78bfa, 2.2, 30);
            key.position.set(5, 4, 6);
            scene.add(key);
            const rim = new THREE.PointLight(0x60a5fa, 1.8, 30);
            rim.position.set(-6, -3, 4);
            scene.add(rim);

            const shape1 = new THREE.Mesh(
                new THREE.TorusKnotGeometry(1.5, 0.45, 180, 24),
                new THREE.MeshStandardMaterial({
                    color: 0x7c3aed,
                    metalness: 0.65,
                    roughness: 0.25,
                    emissive: 0x2a1065,
                    emissiveIntensity: 0.4
                })
            );
            shape1.position.set(3.4, 0.6, 0);
            scene.add(shape1);

            const shape2 = new THREE.Mesh(
                new THREE.IcosahedronGeometry(1.6, 0),
                new THREE.MeshStandardMaterial({
                    color: 0x2563eb,
                    metalness: 0.5,
                    roughness: 0.35,
                    emissive: 0x0b2a6b,
                    emissiveIntensity: 0.4,
                    wireframe: false
                })
            );
            shape2.position.set(-3.6, -0.4, -1);
            scene.add(shape2);

            const wire = new THREE.Mesh(
                new THREE.IcosahedronGeometry(1.9, 0),
                new THREE.MeshBasicMaterial({
                    color: 0x93c5fd,
                    wireframe: true,
                    transparent: true,
                    opacity: 0.18
                })
            );
            wire.position.copy(shape2.position);
            scene.add(wire);

            shape1.scale.setScalar(0.001);
            shape2.scale.setScalar(0.001);
            wire.scale.setScalar(0.001);
            shape1.rotation.set(1.2, -1.4, 0.6);
            shape2.rotation.set(-1.1, 1.3, -0.5);

            function resize() {
                width = heroSection.clientWidth;
                height = heroSection.clientHeight;
                renderer.setSize(width, height);
                camera.aspect = width / height;
                camera.updateProjectionMatrix();
            }
            window.addEventListener('resize', resize);

            let frame = 0;

            function animate() {
                frame += 1;
                shape1.rotation.x += 0.0035;
                shape1.rotation.y += 0.005;
                shape2.rotation.x -= 0.003;
                shape2.rotation.y -= 0.0045;
                wire.rotation.copy(shape2.rotation);
                shape1.position.y = 0.6 + Math.sin(frame * 0.01) * 0.25;
                shape2.position.y = -0.4 + Math.cos(frame * 0.012) * 0.22;
                wire.position.y = shape2.position.y;
                renderer.render(scene, camera);
                requestAnimationFrame(animate);
            }
            animate();

            if (typeof gsap !== 'undefined') {
                const tl = gsap.timeline({
                    defaults: {
                        ease: 'power3.out'
                    }
                });
                tl.to(shape1.scale, {
                        x: 1,
                        y: 1,
                        z: 1,
                        duration: 1.4,
                        ease: 'back.out(1.4)'
                    }, 0.1)
                    .to(shape1.rotation, {
                        x: 0,
                        y: 0.4,
                        z: 0,
                        duration: 1.6,
                        ease: 'power2.out'
                    }, 0.1)
                    .to(shape2.scale, {
                        x: 1,
                        y: 1,
                        z: 1,
                        duration: 1.4,
                        ease: 'back.out(1.4)'
                    }, 0.25)
                    .to(wire.scale, {
                        x: 1,
                        y: 1,
                        z: 1,
                        duration: 1.4,
                        ease: 'back.out(1.4)'
                    }, 0.25)
                    .to(shape2.rotation, {
                        x: 0,
                        y: -0.4,
                        z: 0,
                        duration: 1.6,
                        ease: 'power2.out'
                    }, 0.25)
                    .from('#hero-eyebrow', {
                        opacity: 0,
                        y: 20,
                        duration: .6
                    }, 0.5)
                    .from('#hero-title', {
                        opacity: 0,
                        y: 40,
                        duration: .8
                    }, 0.65)
                    .from('#hero-lead', {
                        opacity: 0,
                        y: 30,
                        duration: .8
                    }, 0.85)
                    .from('#hero-ctas', {
                        opacity: 0,
                        y: 30,
                        duration: .8
                    }, 1.0)
                    .from('#main-header', {
                        opacity: 0,
                        y: -30,
                        duration: .7
                    }, 0.2);
            }
        })();
    </script>

    @session('error')
        <span class="block bg-red-600 text-white text-sm text-center p-3 rounded-lg error-from-google">
            {{ session('error') }}
        </span>
    @endsession

    <section class="brands reveal">
        <div class="container">
            <div class="brands-track">
                <span>NIKE</span>
                <span>SONY</span>
                <span>APPLE</span>
                <span>SAMSUNG</span>
                <span>ADIDAS</span>
                <span>PUMA</span>
            </div>
        </div>
    </section>

    <section id="categories" class="categories reveal">
        <div class="glow-blob" style="width:420px;height:420px;background:#7c3aed;top:-120px;left:-120px;"></div>
        <div class="container">
            <div class="section-head">
                <span class="eyebrow"><span class="dot"></span> Browse</span>
                <h2>Shop By Category</h2>
                <p>Find exactly what you're looking for</p>
            </div>
            <div class="category-grid reveal-stagger in-view">
                <div class="glass-card category">
                    <div class="icon-circle">
                        <i class="fa-solid fa-shirt"></i>
                    </div>
                    <h3>Fashion</h3>
                    <p>Latest clothes collection</p>
                </div>
                <div class="glass-card category">
                    <div class="icon-circle">
                        <i class="fa-solid fa-laptop"></i>
                    </div>
                    <h3>Electronics</h3>
                    <p>Modern devices</p>
                </div>
                <div class="glass-card category">
                    <div class="icon-circle">
                        <i class="fa-solid fa-couch"></i>
                    </div>
                    <h3>Furniture</h3>
                    <p>Home decoration</p>
                </div>
                <div class="glass-card category">
                    <div class="icon-circle">
                        <i class="fa-solid fa-gamepad"></i>
                    </div>
                    <h3>Gaming</h3>
                    <p>Gaming accessories</p>
                </div>
            </div>
        </div>
    </section>

    <section class="stats reveal">
        <div class="container">
            <div class="stats-grid reveal-stagger in-view">
                <div>
                    <h3>50K+</h3>
                    <p>Happy Customers</p>
                </div>
                <div>
                    <h3>1.2K+</h3>
                    <p>Products</p>
                </div>
                <div>
                    <h3>120+</h3>
                    <p>Countries Served</p>
                </div>
                <div>
                    <h3>4.9★</h3>
                    <p>Average Rating</p>
                </div>
            </div>
        </div>
    </section>

    <section class="flash-sale reveal">
        <div class="container">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <span class="eyebrow"><span class="dot"></span> Limited Time</span>
                    <h2>Flash Sale 🔥</h2>
                    <p class="lead mt-5">
                        Limited time offers. Get your favorite products with huge discounts.
                    </p>
                    <div class="flex gap-4 mt-8">
                        <div class="countdown-chip">
                            <h4>05</h4>
                            <span>Days</span>
                        </div>
                        <div class="countdown-chip">
                            <h4>12</h4>
                            <span>Hours</span>
                        </div>
                        <div class="countdown-chip">
                            <h4>35</h4>
                            <span>Mins</span>
                        </div>
                    </div>
                    <a href="{{ route('products.index') }}" class="hero-btn-primary mt-9"
                        style="display:inline-flex;">
                        Shop Discount <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
                <div class="art-frame">
                    <img src="https://images.unsplash.com/photo-1607083206968-13611e3d76db" alt="">
                </div>
            </div>
        </div>
    </section>

    @if (isset($products) && count($products))
        <section class="products reveal" id="products">
            <div class="glow-blob" style="width:500px;height:500px;background:#2563eb;bottom:-160px;right:-160px;">
            </div>
            <div class="container">
                <div class="section-head">
                    <span class="eyebrow"><span class="dot"></span> Handpicked</span>
                    <h2>Our Products</h2>
                    <p>Discover our latest products with the best quality and prices</p>
                </div>

                <div class="view-more-wrap">
                    <a href="{{ route('products.index') }}" class="view-more-btn">
                        View More <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <div class="product-grid reveal-stagger">

                    @foreach ($products->take(6) as $product)
                        <form action="{{ route('product-details', $product->id) }}" method="POST">
                            @csrf
                            <div class="product-card">
                                <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f"
                                    alt="">
                                {{-- <img src="{{ $product->image }}" alt="Product Photo"> --}}
                                <h3>{{ $product->name }}</h3>
                                <p>{{ substr($product->description, 0, 25) }}...</p>
                                <span>{{ $product->price }}</span>
                                <button type="submit">View more</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="offer reveal">
        <div class="offer-content">
            <span class="eyebrow"><span class="dot"></span> Special Offer</span>
            <h2>Up To 50% Off</h2>
            <p>
                On selected products, for a limited time only.
            </p>
            <a href="{{ route('products.index') }}" style="display:inline-block; text-decoration:none;">
                <button>Shop Now</button>
            </a>
        </div>
    </section>

    <section class="why-us reveal">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow"><span class="dot"></span> Our Promise</span>
                <h2>Why Choose Us?</h2>
                <p>What makes ShopZone different</p>
            </div>
            <div class="features reveal-stagger in-view">
                <div class="glass-card feature">
                    <div class="icon-circle">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <h3>Fast Delivery</h3>
                    <p>
                        We deliver your products quickly and safely.
                    </p>
                </div>
                <div class="glass-card feature">
                    <div class="icon-circle">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <h3>Secure Payment</h3>
                    <p>
                        Your payments are completely secure.
                    </p>
                </div>
                <div class="glass-card feature">
                    <div class="icon-circle">
                        <i class="fa-solid fa-gem"></i>
                    </div>
                    <h3>High Quality</h3>
                    <p>
                        We provide premium products.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="reviews reveal">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow"><span class="dot"></span> Testimonials</span>
                <h2>What Our Customers Say</h2>
                <p>Real feedback from real ShopZone shoppers</p>
            </div>
            <div class="review-grid reveal-stagger">
                <div class="glass-card review">
                    <div class="stars">★★★★★</div>
                    <p>"Fast delivery and the quality is way better than I expected. Definitely ordering again."</p>
                    <h4>— Sarah M.</h4>
                </div>
                <div class="glass-card review">
                    <div class="stars">★★★★★</div>
                    <p>"Great prices and the checkout was super smooth. My go-to store now."</p>
                    <h4>— Ahmed K.</h4>
                </div>
                <div class="glass-card review">
                    <div class="stars">★★★★☆</div>
                    <p>"Support team helped me swap a size in minutes. Really solid customer service."</p>
                    <h4>— Laila H.</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="blog reveal">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow"><span class="dot"></span> Journal</span>
                <h2>From Our Blog</h2>
                <p>Tips, trends and stories from the ShopZone team</p>
            </div>
            <div class="blog-grid reveal-stagger">
                <div class="glass-card blog-card">
                    <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8" alt="">
                    <div class="blog-card-content">
                        <span>FASHION</span>
                        <h3>Top 10 Trends This Season</h3>
                        <p>Discover the styles everyone is wearing this year and how to shop them smart.</p>
                    </div>
                </div>
                <div class="glass-card blog-card">
                    <img src="https://images.unsplash.com/photo-1518770660439-4636190af475" alt="">
                    <div class="blog-card-content">
                        <span>TECH</span>
                        <h3>Choosing The Right Gadget</h3>
                        <p>A quick buying guide to help you pick the perfect device for your needs.</p>
                    </div>
                </div>
                <div class="glass-card blog-card">
                    <img src="https://images.unsplash.com/photo-1487014679447-9f8336841d58" alt="">
                    <div class="blog-card-content">
                        <span>LIFESTYLE</span>
                        <h3>Home Decor On A Budget</h3>
                        <p>Simple ideas to refresh your space without breaking the bank.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section reveal" id="about">
        <div class="container" style="max-width:800px;">
            <div class="section-head">
                <span class="eyebrow"><span class="dot"></span> Help Center</span>
                <h2>Frequently Asked Questions</h2>
                <p>Everything you need to know before you shop</p>
            </div>

            <div class="faq-item" onclick="toggleFaq(this)">
                <h4>How long does shipping take? <i class="fa-solid fa-chevron-down"></i></h4>
                <div class="faq-answer">Standard delivery takes 3-5 business days, express delivery takes 1-2 business
                    days depending on your location.</div>
            </div>
            <div class="faq-item" onclick="toggleFaq(this)">
                <h4>What is your return policy? <i class="fa-solid fa-chevron-down"></i></h4>
                <div class="faq-answer">You can return any item within 14 days of delivery for a full refund, as long
                    as it's unused and in original packaging.</div>
            </div>
            <div class="faq-item" onclick="toggleFaq(this)">
                <h4>Do you ship internationally? <i class="fa-solid fa-chevron-down"></i></h4>
                <div class="faq-answer">Yes! We currently ship to over 120 countries worldwide with tracked
                    international shipping.</div>
            </div>
            <div class="faq-item" onclick="toggleFaq(this)">
                <h4>Is my payment information secure? <i class="fa-solid fa-chevron-down"></i></h4>
                <div class="faq-answer">Absolutely. All payments are processed through encrypted, PCI-compliant payment
                    gateways.</div>
            </div>
        </div>
    </section>

    <section class="instagram-feed reveal">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow"><span class="dot"></span> Community</span>
                <h2>Follow Us @shopzone</h2>
                <p>Join our community and get featured</p>
            </div>
            <div class="insta-grid">
                <a href="#"><img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30"
                        alt=""></a>
                <a href="#"><img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e"
                        alt=""></a>
                <a href="#"><img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f"
                        alt=""></a>
                <a href="#"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff"
                        alt=""></a>
                <a href="#"><img src="https://images.unsplash.com/photo-1607083206968-13611e3d76db"
                        alt=""></a>
                <a href="#"><img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9"
                        alt=""></a>
            </div>
        </div>
    </section>

    <section class="newsletter" id="newsletter">
        <div class="container" style="max-width:600px;">
            <span class="eyebrow"><span class="dot"></span> Stay Updated</span>
            <h2>Join Our Newsletter</h2>
            <p>Get the latest drops and offers straight to your inbox</p>
            <form method="POST" action="{{ route('Subscribe') }}" class="newsletter_form">
                @csrf
                @error('email')
                    <span class="block text-red-600 text-sm">
                        {{ $message }}
                    </span>
                @enderror
                <input type="email" name="email" placeholder="you@example.com">
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </section>

    <footer class="footer" id="contact">
        <div class="container footer-container">
            <div class="footer-box">
                <h3>ShopZone</h3>
                <p>
                    Your trusted online store for high quality products.
                    We provide the best deals with fast delivery and secure payment.
                </p>
                <div class="social">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
            </div>
            <div class="footer-box">
                <h3>Quick Links</h3>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li>
                        <a href="#about">About Us</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="footer-box">
                <h3>Customer Service</h3>
                <ul>
                    <li>
                        <a href="{{ route('profile') }}">My Account</a>
                    </li>
                    <li>
                        <a href="#">Shipping Policy</a>
                    </li>
                </ul>
            </div>
            <div class="footer-box">
                <h3>Contact Us</h3>
                <p>
                    Egypt, Cairo
                </p>
                <p>
                    01023046551
                </p>
                <p>
                    eng.ahmedwalid69@gmail.com
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>
                © 2026 ShopZone. All Rights Reserved.
            </p>
        </div>
    </footer>
</body>

</html>
