<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetDrove Catalog</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #0a1929;
            --secondary-blue: #1e3a8a;
            --accent-blue: #3b82f6;
            --light-blue: #60a5fa;
            --dark-navy: #0f172a;
            --steel-blue: #475569;
            --cyan-accent: #06b6d4;
            --gradient-primary: linear-gradient(135deg, #0a1929, #1e3a8a);
            --gradient-secondary: linear-gradient(135deg, #1e3a8a, #3b82f6);
            --gradient-accent: linear-gradient(135deg, #3b82f6, #06b6d4);
            --shadow-blue: rgba(59, 130, 246, 0.3);
            --shadow-dark: rgba(10, 25, 41, 0.5);
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideLeft {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes dataFlow {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100vw); }
        }

        @keyframes scanLine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: #e2e8f0;
            overflow-x: hidden;
            min-height: 100vh;
            background: var(--dark-navy);
        }

        .catalog-container {
            min-height: 100vh;
            width: 100vw;
            position: relative;
            background: var(--gradient-primary);
        }

        .catalog-container::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                repeating-linear-gradient(0deg, transparent, transparent 40px, var(--cyan-accent) 41px, var(--cyan-accent) 42px),
                repeating-linear-gradient(90deg, transparent, transparent 40px, var(--light-blue) 41px, var(--light-blue) 42px);
            opacity: 0.05;
            pointer-events: none;
            z-index: -1;
        }

        .catalog-header {
            background: var(--gradient-secondary);
            padding: 40px 20px;
            position: relative;
            box-shadow: 0 10px 30px var(--shadow-dark);
            animation: slideDown 1s ease-out;
        }

        .catalog-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-accent);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .back-button {
            background: rgba(6, 182, 212, 0.2);
            color: var(--cyan-accent);
            padding: 12px 25px;
            text-decoration: none;
            font-weight: 700;
            border: 2px solid var(--cyan-accent);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .back-button:hover {
            background: var(--cyan-accent);
            color: #ffffff;
            transform: translateX(-5px);
        }

        .page-title {
            font-family: 'Orbitron', monospace;
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 900;
            color: #ffffff;
            text-shadow: 0 0 20px var(--cyan-accent);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .content-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .task-section {
            margin: 60px 0;
            animation: slideUp 1s ease-out;
        }

        .task-header {
            background: var(--gradient-accent);
            color: #ffffff;
            padding: 25px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .task-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: scanLine 3s infinite;
        }

        .task-title {
            font-family: 'Orbitron', monospace;
            font-size: 1.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
        }

        .data-card {
            background: rgba(30, 58, 138, 0.2);
            border: 2px solid var(--accent-blue);
            backdrop-filter: blur(10px);
            padding: 40px;
            margin: 30px 0;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .data-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--cyan-accent);
        }

        .data-card:hover {
            border-color: var(--cyan-accent);
            transform: translateX(10px);
            box-shadow: 0 15px 40px var(--shadow-blue);
        }

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin: 30px 0;
        }

        .product-tag {
            background: var(--gradient-accent);
            color: #ffffff;
            padding: 12px 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .product-tag:hover {
            border-color: var(--cyan-accent);
            transform: scale(1.05);
        }

        .price-display {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .price-module {
            background: var(--gradient-secondary);
            color: #ffffff;
            padding: 20px 35px;
            font-weight: 700;
            font-size: 1.3rem;
            border: 2px solid var(--cyan-accent);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .price-module::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, var(--cyan-accent), transparent);
            opacity: 0.3;
            transition: all 0.5s ease;
        }

        .price-module:hover::before {
            left: 100%;
        }

        .featured-module {
            background: rgba(15, 23, 42, 0.8);
            border: 2px solid var(--cyan-accent);
            backdrop-filter: blur(15px);
            padding: 50px;
            margin: 40px 0;
            position: relative;
        }

        .featured-module::after {
            content: '';
            position: absolute;
            top: -2px;
            right: -2px;
            bottom: -2px;
            left: -2px;
            background: var(--gradient-accent);
            z-index: -1;
            border-radius: inherit;
        }

        .product-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .product-name {
            font-family: 'Orbitron', monospace;
            font-size: 2.5rem;
            color: #ffffff;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .spec-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .spec-item {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid var(--accent-blue);
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .spec-item:hover {
            background: rgba(59, 130, 246, 0.2);
            border-color: var(--cyan-accent);
            transform: translateY(-3px);
        }

        .spec-item.highlight {
            background: var(--gradient-accent);
            color: #ffffff;
            border-color: var(--cyan-accent);
        }

        .spec-label {
            font-weight: 700;
            color: var(--cyan-accent);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .spec-value {
            font-size: 1.2rem;
            font-weight: 500;
        }

        .description-panel {
            background: rgba(6, 182, 212, 0.1);
            border: 2px solid var(--cyan-accent);
            padding: 25px;
            text-align: center;
            font-style: italic;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        /* Catalog Grid */
        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }

        .catalog-unit {
            background: rgba(30, 58, 138, 0.3);
            border: 2px solid var(--steel-blue);
            backdrop-filter: blur(10px);
            padding: 35px;
            text-align: center;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .catalog-unit::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, transparent, var(--cyan-accent), transparent);
            opacity: 0;
            transition: all 0.5s ease;
            animation: dataFlow 3s linear infinite;
        }

        .catalog-unit:hover::before {
            opacity: 0.1;
        }

        .catalog-unit:hover {
            border-color: var(--cyan-accent);
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px var(--shadow-blue);
        }

        .product-icon {
            font-size: 3.5rem;
            color: var(--cyan-accent);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .catalog-unit:hover .product-icon {
            color: #ffffff;
            transform: scale(1.1);
        }

        .product-title {
            font-family: 'Orbitron', monospace;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 20px 0;
            color: var(--cyan-accent);
        }

        .status-indicator {
            font-size: 1rem;
            margin-top: 15px;
            padding: 8px 16px;
            background: var(--gradient-accent);
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* Footer Section */
        .system-footer {
            background: var(--gradient-secondary);
            text-align: center;
            padding: 40px;
            margin-top: 60px;
            border-top: 4px solid var(--cyan-accent);
            animation: slideUp 1s ease-out;
        }

        .footer-title {
            font-family: 'Orbitron', monospace;
            font-size: 1.8rem;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            
            .content-container {
                padding: 40px 15px;
            }
            
            .catalog-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
            }
            
            .spec-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .price-display {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 480px) {
            .catalog-header {
                padding: 30px 15px;
            }
            
            .featured-module {
                padding: 30px;
            }
            
            .data-card {
                padding: 25px;
            }
            
            .product-grid {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="catalog-container">
        <div class="catalog-header">
            <div class="nav-container">
                <a href="index.html" class="back-button">
                    <i class="fas fa-arrow-left"></i> Return to Portal
                </a>
                <h1 class="page-title">
                    <i class="fas fa-database"></i>
                    GadgetDrove Catalog
                </h1>
            </div>
        </div>

        <div class="content-container">
<?php
echo '<div class="task-section">';
echo '<div class="task-header">';
echo '<div class="task-title">';
echo '<i class="fas fa-list-ul"></i> Task 1: Product Database Initialization';
echo '</div>';
echo '</div>';

$productNames = ["Wireless Mouse", "Mechanical Keyboard", "USB-C Hub", "Portable Speaker"];
$productPrices = [25.99, 79.99, 34.50, 49.99];

echo '<div class="data-card">';
echo '<h3 style="color: var(--cyan-accent); font-family: Orbitron, monospace; font-size: 1.5rem; margin-bottom: 25px; text-transform: uppercase; letter-spacing: 1px;"><i class="fas fa-microchip"></i> System Inventory:</h3>';
echo '<div class="product-grid">';
foreach ($productNames as $name) {
    echo '<span class="product-tag">' . $name . '</span>';
}
echo '</div>';

echo '<div class="price-display">';
echo '<div class="price-module">';
echo '<i class="fas fa-tag"></i> FIRST UNIT: ₱' . number_format($productPrices[0], 2);
echo '</div>';
echo '<div class="price-module">';
echo '<i class="fas fa-tag"></i> FINAL UNIT: ₱' . number_format($productPrices[count($productPrices)-1], 2);
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="task-section">';
echo '<div class="task-header">';
echo '<div class="task-title">';
echo '<i class="fas fa-star"></i> Task 2: Advanced Product Analysis';
echo '</div>';
echo '</div>';

$featuredProduct = [
    "name" => "Mechanical Keyboard",
    "price" => 79.99,
    "brand" => "KeyTech",
    "inStock" => true,
    "description" => "High-performance mechanical keyboard featuring RGB backlighting, premium tactile switches, and advanced customization capabilities for professional and gaming applications"
];

echo '<div class="featured-module">';
echo '<div class="product-header">';
echo '<h2 class="product-name"><i class="fas fa-keyboard"></i> ' . $featuredProduct["name"] . '</h2>';
echo '</div>';
echo '<div class="spec-grid">';
echo '<div class="spec-item">';
echo '<div class="spec-label"><i class="fas fa-industry"></i> Manufacturer</div>';
echo '<div class="spec-value">' . $featuredProduct["brand"] . '</div>';
echo '</div>';
echo '<div class="spec-item highlight">';
echo '<div class="spec-label"><i class="fas fa-dollar-sign"></i> System Price</div>';
echo '<div class="spec-value">₱' . number_format($featuredProduct["price"], 2) . '</div>';
echo '</div>';
echo '<div class="spec-item">';
echo '<div class="spec-label"><i class="fas fa-check-circle"></i> Availability</div>';
echo '<div class="spec-value">' . ($featuredProduct["inStock"] ? "IN STOCK" : "UNAVAILABLE") . '</div>';
echo '</div>';

$featuredProduct["warranty"] = "2 years";
echo '<div class="spec-item">';
echo '<div class="spec-label"><i class="fas fa-shield-alt"></i> Warranty</div>';
echo '<div class="spec-value">' . $featuredProduct["warranty"] . '</div>';
echo '</div>';
echo '</div>';
echo '<div class="description-panel">';
echo '<i class="fas fa-info-circle"></i> ';
echo $featuredProduct["description"];
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="task-section">';
echo '<div class="task-header">';
echo '<div class="task-title">';
echo '<i class="fas fa-th-large"></i> Task 3: Complete System Catalog';
echo '</div>';
echo '</div>';

$catalog = [
    [
        "id" => 1,
        "name" => "Wireless Mouse",
        "price" => 25.99,
        "inStock" => true
    ],
    [
        "id" => 2,
        "name" => "Mechanical Keyboard",
        "price" => 79.99,
        "inStock" => true
    ],
    [
        "id" => 3,
        "name" => "USB-C Hub",
        "price" => 34.50,
        "inStock" => true
    ],
    [
        "id" => 4,
        "name" => "Portable Speaker",
        "price" => 49.99,
        "inStock" => false
    ]
];

echo '<div class="catalog-grid">';
foreach ($catalog as $product) {
    if ($product["inStock"]) {
        echo '<div class="catalog-unit">';
        echo '<div class="product-icon">';
        echo '<i class="fas fa-cube"></i>';
        echo '</div>';
        echo '<h3 class="product-title">' . $product["name"] . '</h3>';
        echo '<div class="product-price">₱' . number_format($product["price"], 2) . '</div>';
        echo '<div class="status-indicator">';
        echo '<i class="fas fa-check"></i> System Ready';
        echo '</div>';
        echo '</div>';
    }
}
echo '</div>';
echo '</div>';

echo '<div class="system-footer">';
echo '<h3 class="footer-title">';
echo '<i class="fas fa-terminal"></i> GadgetDrove Systems Online';
echo '</h3>';
echo '</div>';
echo '</div>';
echo '</div>';
?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const units = document.querySelectorAll('.catalog-unit');
            units.forEach((unit, index) => {
                unit.style.animationDelay = `${index * 0.2}s`;
                unit.style.animation = 'slideUp 0.8s ease-out forwards';
            });

            const specItems = document.querySelectorAll('.spec-item');
            specItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05) translateY(-5px)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1) translateY(0)';
                });
            });

            const priceModules = document.querySelectorAll('.price-module');
            priceModules.forEach(module => {
                module.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 150);
                });
            });
        });
    </script>
</body>
</html>
