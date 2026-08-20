<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['blocked'])):
?>
<!-- Warning message - lumalabas lang kapag na-redirect mula sa middleware -->
<?php endif; ?>


<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #eef2f9;
            margin: 0;
            min-height: 100vh;
        }

        .wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
            min-height: 100vh;
        }

        /* the split card itself */
        .hero {
            display: flex;
            width: 100%;
            max-width: 940px;
            min-height: 500px;
            background: #fff;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(20, 41, 61, 0.18);
        }

        /* LEFT PANEL - dark gradient side with dotted pattern */
        .panel-left {
            flex: 1 1 42%;
            background: linear-gradient(160deg, #0d1b3e 0%, #163b73 55%, #1c6fc9 130%);
            color: #fff;
            padding: 45px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .dots {
            position: absolute;
            top: 30px;
            left: 30px;
            width: 60px;
            height: 60px;
            background-image: radial-gradient(rgba(255,255,255,0.35) 1.5px, transparent 1.5px);
            background-size: 10px 10px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.12);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
            padding: 6px 14px;
            border-radius: 20px;
            width: fit-content;
            position: relative;
        }

        .badge::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #7fc0ff;
            display: inline-block;
        }

        .title {
            font-size: 32px;
            font-weight: 800;
            margin: 30px 0 20px;
            line-height: 1.25;
            text-align: left;
            position: relative;
        }

        .title .highlight {
            color: #7fc0ff;
        }

        .feature-list {
            list-style: none;
            margin: 0 0 30px;
            padding: 0;
            position: relative;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: rgba(255,255,255,0.85);
            margin-bottom: 14px;
        }

        .feature-list .icon {
            width: 22px;
            height: 22px;
            border-radius: 6px;
            background: rgba(255,255,255,0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            flex-shrink: 0;
        }

        .btn-row {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 0;
            position: relative;
        }

        .btn-primary {
            background: linear-gradient(135deg, #1c6fc9, #163b73);
            color: #fff;
            text-decoration: none;
            padding: 13px 26px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 14px;
            text-align: center;
            transition: opacity 0.2s ease;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .btn-outline {
            background: transparent;
            color: #fff;
            text-decoration: none;
            padding: 13px 26px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            border: 1px solid rgba(255,255,255,0.35);
            text-align: center;
            transition: border-color 0.2s ease, background 0.2s ease;
        }

        .btn-outline:hover {
            border-color: rgba(255,255,255,0.7);
            background: rgba(255,255,255,0.06);
        }

        /* RIGHT PANEL - light info side */
        .panel-right {
            flex: 1 1 58%;
            padding: 40px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fff;
        }

        .panel-right-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .brand-mark {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 700;
            color: #14293d;
        }

        .brand-mark .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #1c6fc9;
        }

        .warning-box {
            background: #fff5f5;
            border: 1px solid #ffd1d1;
            color: #c0356c;
            padding: 14px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            text-align: left;
        }

        h1.panel-heading {
            color: #14293d;
            font-size: 20px;
            margin: 0 0 22px;
            font-weight: 800;
            text-align: left;
        }

        .info-card ol {
            margin: 0;
            padding: 0;
            list-style: none;
            counter-reset: step;
        }

        .info-card li {
            counter-increment: step;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 14px;
            color: #444;
            margin-bottom: 16px;
        }

        .info-card li:last-child {
            margin-bottom: 0;
        }

        .info-card li::before {
            content: counter(step);
            background: #dceafd;
            color: #1c6fc9;
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
        }

        @media (max-width: 760px) {
            .hero {
                flex-direction: column;
                max-width: 440px;
            }
            .panel-left, .panel-right {
                padding: 32px 28px;
            }
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <div class="wrapper">
        <div class="hero">

            <!-- LEFT: dark portal panel -->
            <div class="panel-left">
                <div>
                    <div class="dots"></div>
                    <div class="badge">STUDENT PORTAL</div>
                    <h1 class="title">Welcome to <span class="highlight">My Page</span></h1>
                    <ul class="feature-list">
                        <li></span> See your details right after</li>
                    </ul>
                </div>

                <div class="btn-row">
                    <a href="<?= site_url('student/profile') ?>" class="btn-primary">Open Profile</a>
                    <a href="<?= site_url('student') ?>" class="btn-outline">About Ericha</a>
                </div>
            </div>

            <!-- RIGHT: light info panel -->
            <div class="panel-right">
                <div class="panel-right-top">
                    <div class="brand-mark"><span class="dot"></span> STUDENT PORTAL</div>
                </div>

                <?php if (isset($_GET['blocked'])): ?>
                <div class="warning-box">
                    <strong>Whoa there.</strong> You tried to open the Profile page directly without visiting the lobby first. Click the button below to continue.
                </div>
                <?php endif; ?>

                <h1 class="panel-heading">How It Works</h1>
                <div class="info-card">
                    <ol>
                        <li>Visit the home route — this is the lobby page.</li>
                        <li>Click the "Open Profile" button to proceed.</li>
                        <li>The middleware checks whether you have access before continuing.</li>
                        <li>Once verified, your student information is displayed on the profile page.</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
</body>
</html>