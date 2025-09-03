<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* CSS Variables for Blue/Cool Theme */
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
            --success-green: #10b981;
            --warning-orange: #f59e0b;
            --error-red: #ef4444;
        }

        /* Keyframe Animations */
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

        @keyframes scanLine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        @keyframes statusPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
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

        /* Full-Screen Container */
        .dashboard-container {
            min-height: 100vh;
            width: 100vw;
            position: relative;
            background: var(--gradient-primary);
        }

        /* Animated Background */
        .dashboard-container::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 20%, var(--cyan-accent) 0%, transparent 25%),
                radial-gradient(circle at 80% 80%, var(--light-blue) 0%, transparent 25%),
                radial-gradient(circle at 40% 60%, var(--accent-blue) 0%, transparent 20%);
            opacity: 0.03;
            pointer-events: none;
            z-index: -1;
        }

        /* Header Section */
        .dashboard-header {
            background: var(--gradient-secondary);
            padding: 40px 20px;
            position: relative;
            box-shadow: 0 10px 30px var(--shadow-dark);
            animation: slideDown 1s ease-out;
        }

        .dashboard-header::after {
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

        /* Content Container */
        .content-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        /* Task Sections */
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

        /* Dashboard Cards */
        .control-panel {
            background: rgba(30, 58, 138, 0.2);
            border: 2px solid var(--accent-blue);
            backdrop-filter: blur(10px);
            padding: 50px;
            margin: 30px 0;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            text-align: center;
        }

        .control-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--cyan-accent);
        }

        .control-panel:hover {
            border-color: var(--cyan-accent);
            transform: translateY(-5px);
            box-shadow: 0 20px 40px var(--shadow-blue);
        }

        .user-identity {
            margin-bottom: 30px;
        }

        .welcome-title {
            font-family: 'Orbitron', monospace;
            font-size: 2.5rem;
            color: #ffffff;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .status-message {
            font-size: 1.3rem;
            color: var(--light-blue);
            margin-bottom: 30px;
        }

        .user-badges {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .status-badge, .premium-badge {
            padding: 15px 30px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            animation: statusPulse 2s infinite;
        }

        .status-badge {
            background: var(--gradient-accent);
            color: #ffffff;
            border-color: var(--cyan-accent);
        }

        .premium-badge {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #ffffff;
            border-color: #fbbf24;
        }

        .status-badge:hover, .premium-badge:hover {
            transform: scale(1.05);
        }

        /* Access Control Section */
        .access-module {
            background: rgba(15, 23, 42, 0.8);
            border: 2px solid var(--steel-blue);
            backdrop-filter: blur(15px);
            padding: 50px;
            margin: 40px 0;
            position: relative;
            transition: all 0.4s ease;
        }

        .access-module::after {
            content: '';
            position: absolute;
            top: -2px;
            right: -2px;
            bottom: -2px;
            left: -2px;
            background: var(--gradient-secondary);
            z-index: -1;
            border-radius: inherit;
        }

        .access-module:hover {
            border-color: var(--cyan-accent);
        }

        .module-title {
            font-family: 'Orbitron', monospace;
            color: var(--cyan-accent);
            font-size: 1.8rem;
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .permissions-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .permission-item {
            background: rgba(59, 130, 246, 0.1);
            border-left: 4px solid var(--accent-blue);
            padding: 20px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .permission-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, var(--cyan-accent), transparent);
            opacity: 0.1;
            transition: all 0.5s ease;
        }

        .permission-item:hover::before {
            left: 100%;
        }

        .permission-item:hover {
            border-left-color: var(--cyan-accent);
            transform: translateX(10px);
            background: rgba(59, 130, 246, 0.2);
        }

        .permission-item.admin {
            background: rgba(239, 68, 68, 0.1);
            border-left-color: var(--error-red);
        }

        .permission-item.moderator {
            background: rgba(245, 158, 11, 0.1);
            border-left-color: var(--warning-orange);
        }

        .permission-item.member {
            background: rgba(59, 130, 246, 0.1);
            border-left-color: var(--accent-blue);
        }

        .permission-item.premium {
            background: rgba(245, 158, 11, 0.1);
            border-left-color: #fbbf24;
        }

        .permission-item.guest {
            background: rgba(71, 85, 105, 0.1);
            border-left-color: var(--steel-blue);
        }

        .permission-text {
            font-size: 1.2rem;
            font-weight: 500;
            color: #e2e8f0;
        }

        /* Notification System */
        .notification-system {
            background: rgba(30, 58, 138, 0.3);
            border: 2px solid var(--accent-blue);
            backdrop-filter: blur(10px);
            padding: 50px;
            margin: 40px 0;
            text-align: center;
            transition: all 0.4s ease;
        }

        .notification-system:hover {
            border-color: var(--cyan-accent);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px var(--shadow-blue);
        }

        .notification-display {
            padding: 30px;
            border-radius: 8px;
            margin-top: 30px;
            position: relative;
            overflow: hidden;
        }

        .notification-display.email {
            background: rgba(16, 185, 129, 0.2);
            border: 2px solid var(--success-green);
        }

        .notification-display.sms {
            background: rgba(59, 130, 246, 0.2);
            border: 2px solid var(--accent-blue);
        }

        .notification-display.both {
            background: rgba(139, 92, 246, 0.2);
            border: 2px solid #8b5cf6;
        }

        .notification-display.none {
            background: rgba(239, 68, 68, 0.2);
            border: 2px solid var(--error-red);
        }

        .notification-display.invalid {
            background: rgba(245, 158, 11, 0.2);
            border: 2px solid var(--warning-orange);
        }

        .notification-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            display: block;
        }

        .notification-title {
            font-family: 'Orbitron', monospace;
            font-size: 1.5rem;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .notification-description {
            font-size: 1.2rem;
            line-height: 1.6;
        }

        .notification-display.email .notification-icon,
        .notification-display.email .notification-title {
            color: var(--success-green);
        }

        .notification-display.email .notification-description {
            color: #34d399;
        }

        .notification-display.sms .notification-icon,
        .notification-display.sms .notification-title {
            color: var(--accent-blue);
        }

        .notification-display.sms .notification-description {
            color: var(--light-blue);
        }

        .notification-display.both .notification-icon,
        .notification-display.both .notification-title {
            color: #8b5cf6;
        }

        .notification-display.both .notification-description {
            color: #a78bfa;
        }

        .notification-display.none .notification-icon,
        .notification-display.none .notification-title {
            color: var(--error-red);
        }

        .notification-display.none .notification-description {
            color: #f87171;
        }

        .notification-display.invalid .notification-icon,
        .notification-display.invalid .notification-title {
            color: var(--warning-orange);
        }

        .notification-display.invalid .notification-description {
            color: #fbbf24;
        }

        /* System Footer */
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
            
            .user-badges {
                flex-direction: column;
                align-items: center;
            }
            
            .control-panel, .access-module, .notification-system {
                padding: 30px;
            }
        }

        @media (max-width: 480px) {
            .dashboard-header {
                padding: 30px 15px;
            }
            
            .control-panel, .access-module, .notification-system {
                padding: 25px;
            }
            
            .welcome-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <div class="nav-container">
                <a href="index.html" class="back-button">
                    <i class="fas fa-arrow-left"></i> Return to Portal
                </a>
                <h1 class="page-title">
                    <i class="fas fa-terminal"></i>
                    Control Dashboard
                </h1>
            </div>
        </div>

        <div class="content-container">
<?php
echo '<div class="task-section">';
echo '<div class="task-header">';
echo '<div class="task-title">';
echo '<i class="fas fa-user-shield"></i> Task 1: User Authentication System';
echo '</div>';
echo '</div>';

$username = "gabbitot";
$role = "member";
$isActive = true;
$isPremium = true;
$lastLoginDaysAgo = 1;

$welcomeMessage = ($role === "administrator") ? "Administrator Access Granted" : "User " . strtoupper($username) . " Authenticated";
$loginMessage = ($lastLoginDaysAgo <= 1) ? "Recent system access detected." : "Extended period since last access.";

echo '<div class="control-panel">';
echo '<div class="user-identity">';
echo '<h2 class="welcome-title"><i class="fas fa-shield-alt"></i> ' . $welcomeMessage . '</h2>';
echo '<p class="status-message">' . $loginMessage . '</p>';
echo '</div>';
echo '<div class="user-badges">';
echo '<div class="status-badge">';
echo '<i class="fas fa-power-off"></i> System Active';
echo '</div>';
if ($isPremium) {
    echo '<div class="premium-badge">';
    echo '<i class="fas fa-star"></i> Premium Access';
    echo '</div>';
}
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="task-section">';
echo '<div class="task-header">';
echo '<div class="task-title">';
echo '<i class="fas fa-lock"></i> Task 2: Access Control Matrix';
echo '</div>';
echo '</div>';

echo '<div class="access-module">';
echo '<h3 class="module-title"><i class="fas fa-key"></i> Permission Protocol:</h3>';
echo '<div class="permissions-list">';

if (!$isActive) {
    echo '<div class="permission-item">';
    echo '<i class="fas fa-exclamation-triangle"></i> ';
    echo '<span class="permission-text">System access suspended. Contact administrator for reactivation.</span>';
    echo '</div>';
} else {
    if ($role === "administrator") {
        echo '<div class="permission-item admin">';
        echo '<i class="fas fa-crown"></i> ';
        echo '<span class="permission-text">Full administrative privileges activated.</span>';
        echo '</div>';
        echo '<div class="permission-item admin">';
        echo '<i class="fas fa-cogs"></i> ';
        echo '<span class="permission-text">Complete system control and management panel access.</span>';
        echo '</div>';
    } else if ($role === "moderator") {
        echo '<div class="permission-item moderator">';
        echo '<i class="fas fa-shield-alt"></i> ';
        echo '<span class="permission-text">Moderator protocols engaged.</span>';
        echo '</div>';
        echo '<div class="permission-item moderator">';
        echo '<i class="fas fa-tools"></i> ';
        echo '<span class="permission-text">Access granted: Forum Management, User Profiles, Moderation Tools.</span>';
        echo '</div>';
        if ($isPremium) {
            echo '<div class="permission-item premium">';
            echo '<i class="fas fa-star"></i> ';
            echo '<span class="permission-text">Enhanced moderation features unlocked.</span>';
            echo '</div>';
        }
    } else if ($role === "member") {
        echo '<div class="permission-item member">';
        echo '<i class="fas fa-users"></i> ';
        echo '<span class="permission-text">Member access protocols: Forum Posts and Profile Management.</span>';
        echo '</div>';
        if ($isPremium) {
            echo '<div class="permission-item premium">';
            echo '<i class="fas fa-gem"></i> ';
            echo '<span class="permission-text">Premium content library access authorized.</span>';
            echo '</div>';
        }
    } else {
        echo '<div class="permission-item guest">';
        echo '<i class="fas fa-user"></i> ';
        echo '<span class="permission-text">Guest access only. Registration required for enhanced features.</span>';
        echo '</div>';
    }
}
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="task-section">';
echo '<div class="task-header">';
echo '<div class="task-title">';
echo '<i class="fas fa-satellite-dish"></i> Task 3: Communication Protocol';
echo '</div>';
echo '</div>';

$notificationPreference = "email";

echo '<div class="notification-system">';
echo '<h3 class="module-title"><i class="fas fa-broadcast-tower"></i> System Configuration:</h3>';

switch ($notificationPreference) {
    case "email":
        echo '<div class="notification-display email">';
        echo '<i class="fas fa-envelope notification-icon"></i>';
        echo '<h4 class="notification-title">Email Protocol Active</h4>';
        echo '<p class="notification-description">System notifications will be transmitted via electronic mail.</p>';
        echo '</div>';
        break;
    case "sms":
        echo '<div class="notification-display sms">';
        echo '<i class="fas fa-mobile-alt notification-icon"></i>';
        echo '<h4 class="notification-title">SMS Protocol Active</h4>';
        echo '<p class="notification-description">System alerts transmitted via short message service.</p>';
        echo '</div>';
        break;
    case "both":
        echo '<div class="notification-display both">';
        echo '<i class="fas fa-broadcast-tower notification-icon"></i>';
        echo '<h4 class="notification-title">Dual Protocol Active</h4>';
        echo '<p class="notification-description">All communication channels enabled for maximum coverage.</p>';
        echo '</div>';
        break;
    case "none":
        echo '<div class="notification-display none">';
        echo '<i class="fas fa-volume-mute notification-icon"></i>';
        echo '<h4 class="notification-title">Silent Mode Engaged</h4>';
        echo '<p class="notification-description">All system notifications suppressed.</p>';
        echo '</div>';
        break;
    default:
        echo '<div class="notification-display invalid">';
        echo '<i class="fas fa-exclamation-triangle notification-icon"></i>';
        echo '<h4 class="notification-title">Protocol Error Detected</h4>';
        echo '<p class="notification-description">Invalid notification configuration. System requires recalibration.</p>';
        echo '</div>';
        break;
}
echo '</div>';
echo '</div>';

echo '<div class="system-footer">';
echo '<h3 class="footer-title">';
echo '<i class="fas fa-shield-alt"></i> Control Systems Online';
echo '</h3>';
echo '</div>';
echo '</div>';
echo '</div>';
?>

    <script>
        // Enhanced interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Staggered animation for permission items
            const permissions = document.querySelectorAll('.permission-item');
            permissions.forEach((item, index) => {
                item.style.animationDelay = `${index * 0.1}s`;
                item.style.animation = 'slideLeft 0.6s ease-out forwards';
            });

            // Interactive badges
            const badges = document.querySelectorAll('.status-badge, .premium-badge');
            badges.forEach(badge => {
                badge.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 150);
                });
            });

            // Notification system interaction
            const notificationDisplay = document.querySelector('.notification-display');
            if (notificationDisplay) {
                notificationDisplay.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.02)';
                });
                
                notificationDisplay.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            }
        });
    </script>
</body>
</html>