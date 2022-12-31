<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a style="color: #2b0e00;" class="page-link" href="?page=1">First</a></li>
    <?php if ($page > 1):?>
        <li class="page-item"><a style="color: #2b0e00;" class="page-link" href="?page=<?= ($page - 1);?>">Prev</a></li>
    <?php endif; ?>
    <?php if ($page < $tpage):?>
        <li class="page-item"><a style="color: #2b0e00;" class="page-link" href="?page=<?= ($page + 1);?>">Next</a></li>
    <?php endif; ?>
    <li class="page-item"><a style="color: #2b0e00;" class="page-link" href="?page=<?= $tpage ?>">Last</a></li>
  </ul>
</nav>
