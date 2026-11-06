# Financial Health Score - Dokumentasi

## Gambaran Umum

Financial Health Score adalah fitur yang mengukur kesehatan keuangan pengguna dengan skala 0-100 berdasarkan dua faktor utama:

1. **Savings Ratio** (Rasio Tabungan)
2. **Budget Score** (Skor Kepatuhan Budget)

---

## Formula Perhitungan

### Formula Utama

```
Health Score = (Savings Ratio × 50%) + (Budget Score × 50%)
```

### 1. Savings Ratio (Rasio Tabungan)

**Formula:**

```
Savings Ratio = ((Total Income - Total Expense) / Total Income) × 100
```

**Penjelasan:**

- Mengukur persentase pemasukan yang berhasil ditabung bulan ini
- Jika tidak ada pemasukan, nilai = 0

**Contoh:**

| Income | Expense | Savings | Ratio |
|--------|---------|---------|-------|
| Rp 10.000.000 | Rp 7.000.000 | Rp 3.000.000 | 30% |
| Rp 5.000.000 | Rp 6.000.000 | -Rp 1.000.000 | -20% |

---

### 2. Budget Score (Skor Kepatuhan Budget)

**Formula:**

```
Budget Score = ((Total Budget Aktif - Budget Over Limit) / Total Budget Aktif) × 100
```

**Penjelasan:**

- Mengukur persentase budget yang tidak terlampaui
- Jika tidak ada budget aktif, nilai default = 100

**Contoh:**

| Total Budget | Over Budget | Score |
|--------------|-------------|-------|
| 4 | 0 | 100% |
| 4 | 1 | 75% |
| 4 | 2 | 50% |
| 0 | 0 | 100% (default) |

---

### 3. Final Health Score

**Formula:**

```
Health Score = min(100, max(0, round(Savings Ratio × 0.5 + Budget Score × 0.5)))
```

**Batasan:**

- Minimum: 0
- Maximum: 100

---

## Status Berdasarkan Score

| Range | Status | Emoji |
|-------|--------|-------|
| 80-100 | Excellent! Keep it up. | 🌟 |
| 60-79 | Good. Room to improve. | 👍 |
| 40-59 | Fair. Watch your spending. | ⚠️ |
| 0-39 | Needs attention. | 🚨 |

---

## Contoh Perhitungan Lengkap

**Data:**

- Total Income: Rp 10.000.000
- Total Expense: Rp 6.000.000
- Budget Aktif: 4
- Budget Over Limit: 1

**Perhitungan:**

```
1. Savings Ratio = ((10.000.000 - 6.000.000) / 10.000.000) × 100
                 = (4.000.000 / 10.000.000) × 100
                 = 40%

2. Budget Score = ((4 - 1) / 4) × 100
                = (3 / 4) × 100
                = 75%

3. Health Score = (40 × 0.5) + (75 × 0.5)
                = 20 + 37.5
                = 57.5
                = 58 (dibulatkan)

4. Status = "Fair. Watch your spending." ⚠️
```

---

## Implementasi

File: `app/Http/Controllers/DashboardController.php`

```php
// 8. FINANCIAL HEALTH SCORE (0-100)
$savingsRatio = $totalIncome > 0 
    ? (($totalIncome - $totalExpense) / $totalIncome) * 100 
    : 0;

$budgetScore = 100;
$budgetCount = $activeBudgets->count();
if ($budgetCount > 0) {
    $overBudgetCount = $activeBudgets->filter(fn($b) => $b->percentage > 100)->count();
    $budgetScore = (($budgetCount - $overBudgetCount) / $budgetCount) * 100;
}

$healthScore = min(100, max(0, round(($savingsRatio * 0.5) + ($budgetScore * 0.5))));

$healthStatus = match(true) {
    $healthScore >= 80 => 'Excellent! Keep it up.',
    $healthScore >= 60 => 'Good. Room to improve.',
    $healthScore >= 40 => 'Fair. Watch your spending.',
    default => 'Needs attention.'
};
```

---

## Catatan

- Data dihitung berdasarkan **bulan berjalan**
- Budget yang dihitung adalah budget yang masih **aktif** (belum expired)
- Savings Ratio bisa negatif jika pengeluaran melebihi pemasukan
