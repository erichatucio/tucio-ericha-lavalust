<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            background: #eef2f9;
            margin: 0;
            min-height: 100vh;
        }

        .navbar {
            background: #14293d;
            color: #fff;
            padding: 14px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .brand {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .navbar .nav-links a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }

        .navbar .nav-links a.active {
            background: #4a90e2;
            padding: 6px 14px;
            border-radius: 20px;
        }

        .wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
            min-height: 100vh;
        }

        /* the split card */
        .card {
            display: flex;
            width: 100%;
            max-width: 940px;
            min-height: 500px;
            background: #fff;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(20, 41, 61, 0.18);
        }

        /* LEFT PANEL - dark gradient side with dotted pattern + feature list */
        .panel-left {
            flex: 1 1 42%;
            background: linear-gradient(160deg, #0d1b3e 0%, #163b73 55%, #1c6fc9 130%);
            color: #fff;
            padding: 45px 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
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

        .avatar {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: #cfe3fa;
            margin: 0 0 20px;
            overflow: hidden;
            border: 3px solid #fff;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .panel-title {
            font-size: 28px;
            font-weight: 800;
            line-height: 1.25;
            margin: 0 0 24px;
        }

        .panel-title .highlight {
            color: #7fc0ff;
        }

        .feature-list {
            list-style: none;
            margin: 0;
            padding: 0;
            text-align: left;
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

        /* RIGHT PANEL - light side, form-style layout */
        .panel-right {
            flex: 1 1 58%;
            padding: 40px 45px;
            display: flex;
            flex-direction: column;
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
            background: #4a90e2;
        }

        .back-pill {
            background: #eef2f9;
            color: #14293d;
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.3px;
            padding: 8px 18px;
            border-radius: 20px;
            transition: background 0.2s ease;
        }

        .back-pill:hover {
            background: #dce6f5;
        }

        h1 {
            color: #14293d;
            font-size: 22px;
            margin: 0 0 22px;
            font-weight: 800;
            text-align: left;
        }

        .field-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 25px;
        }

        .field label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: #888;
            letter-spacing: 0.3px;
            margin-bottom: 6px;
        }

        .field .value-box {
            background: #f5f7fb;
            border: 1px solid #e3e8f0;
            border-radius: 10px;
            padding: 11px 14px;
            font-size: 14px;
            color: #14293d;
        }

        .back-btn {
            display: block;
            text-align: center;
            margin-top: auto;
            background: linear-gradient(135deg, #1c6fc9, #163b73);
            color: #fff;
            text-decoration: none;
            padding: 13px 24px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.3px;
            transition: opacity 0.2s ease;
        }

        .back-btn:hover {
            opacity: 0.9;
        }

        @media (max-width: 760px) {
            .card {
                flex-direction: column;
                max-width: 440px;
            }
            .panel-left, .panel-right {
                padding: 32px 28px;
            }
            .field-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <div class="wrapper">
        <div class="card">

            <!-- LEFT: dark portal panel -->
            <div class="panel-left">
                <div class="dots"></div>
                <div class="avatar">
                    <img src="<?= base_url('images/' . $photo) ?>" alt="Student Photo">
                </div>
                <h2 class="panel-title">Ericha Tucio</h2>
                <ul class="feature-list">
                    <li></span> <?= $student_id ?></li>
                    <li></span> <?= $course ?> &amp; <?= $section ?></li>
                    <li></span> <?= $address ?></li>
                </ul>
            </div>

            <!-- RIGHT: light form-style panel -->
            <div class="panel-right">
                <h1>Student Information</h1>

                <div class="field-grid">
                    <div class="field">
                        <label>Birth Date</label>
                        <div class="value-box"><?= $birth_date ?></div>
                    </div>

                    <div class="field">
                        <label>Age</label>
                        <div class="value-box"><?= $age ?></div>
                    </div>
                    <div class="field">
                        <label>Number</label>
                        <div class="value-box"><?= $number ?></div>
                    </div>
                        <div class="field">
                        <label>Email</label>
                        <div class="value-box"><?= $email ?></div>
                    </div>
                        <div class="field">
                        <label>Place of birth</label>
                        <div class="value-box"><?= $place_of_birth ?></div>
                    </div>
                    <div class="field">
                        <label>Address</label>
                        <div class="value-box"><?= $address ?></div>
                    </div>
                </div>

                <a href="<?= site_url('student') ?>" class="back-btn">← Back to Home</a>
            </div>

        </div>
    </div>
</body>
</html>