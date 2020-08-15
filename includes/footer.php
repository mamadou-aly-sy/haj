</div>
<?php $user = $_SESSION['PROFIL'];?>
<?php if ($user['IDPROFIL'] == 1): ?>
    <script type="text/babel" src="../js/AdminNav.js"></script>
<?php elseif ($user['IDPROFIL'] == 2): ?>
    <script type="text/babel" src="../js/AproviserNav.js"></script>
<?php else: ?>
    <script type="text/babel" src="../js/VenderNav.js"></script>
<?php endif?>
<script type="text/babel" src="../js/app.js"></script>

<footer class="footer bg-dark fixed-bottom text-center mt-4">
    <div class="text-center text-white" id="root"></div>
</footer>
</body>

</html>