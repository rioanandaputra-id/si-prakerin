<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// Validation language settings
return [
    // Core Messages
    'noRuleSets'      => 'Tidak ada aturan yang ditentukan dalam konfigurasi Validasi.',
    'ruleNotFound'    => '{0} bukan sebuah aturan yang valid.',
    'groupNotFound'   => '{0} bukan sebuah grup aturan validasi.',
    'groupNotArray'   => '{0} grup aturan harus berupa sebuah array.',
    'invalidTemplate' => '{0} bukan sebuah template Validasi yang valid.',

    // Rule Messages
    'alpha'                 => 'Bidang hanya boleh mengandung karakter alfabet.',
    'alpha_dash'            => 'Bidang hanya boleh berisi karakter alfanumerik, setrip bawah, dan tanda pisah.',
    'alpha_numeric'         => 'Bidang hanya boleh berisi karakter alfanumerik.',
    'alpha_numeric_punct'   => 'Bidang hanya boleh berisi karakter alfanumerik, spasi, dan karakter ~! # $% & * - _ + = | :..',
    'alpha_numeric_space'   => 'Bidang hanya boleh berisi karakter alfanumerik dan spasi.',
    'alpha_space'           => 'Bidang hanya boleh berisi karakter alfabet dan spasi.',
    'decimal'               => 'Bidang harus mengandung sebuah angka desimal.',
    'differs'               => 'Bidang harus berbeda dari bidang {param}.',
    'equals'                => 'Bidang harus persis: {param}.',
    'exact_length'          => 'Bidang harus tepat {param} panjang karakter.',
    'greater_than'          => 'Bidang harus berisi sebuah angka yang lebih besar dari {param}.',
    'greater_than_equal_to' => 'Bidang harus berisi sebuah angka yang lebih besar atau sama dengan {param}.',
    'hex'                   => 'Bidang hanya boleh berisi karakter heksadesimal.',
    'in_list'               => 'Bidang harus salah satu dari: {param}.',
    'integer'               => 'Bidang harus mengandung bilangan bulat.',
    'is_natural'            => 'Bidang hanya boleh berisi angka.',
    'is_natural_no_zero'    => 'Bidang hanya boleh berisi angka dan harus lebih besar dari nol.',
    'is_not_unique'         => 'Bidang harus berisi nilai yang sudah ada sebelumnya dalam database.',
    'is_unique'             => 'Bidang harus mengandung sebuah nilai unik.',
    'less_than'             => 'Bidang harus berisi sebuah angka yang kurang dari {param}.',
    'less_than_equal_to'    => 'Bidang harus berisi sebuah angka yang kurang dari atau sama dengan {param}.',
    'matches'               => 'Bidang tidak cocok dengan bidang {param}.',
    'max_length'            => 'Bidang tidak bisa melebihi {param} panjang karakter.',
    'min_length'            => 'Bidang setidaknya harus {param} panjang karakter.',
    'not_equals'            => 'Bidang tidak boleh: {param}.',
    'not_in_list'           => 'Bidang tidak boleh salah satu dari: {param}.',
    'numeric'               => 'Bidang hanya boleh mengandung angka.',
    'regex_match'           => 'Bidang tidak dalam format yang benar.',
    'required'              => 'Bidang harus diisi.',
    'required_with'         => 'Bidang diperlukan saat {param} hadir.',
    'required_without'      => 'Bidang diperlukan saat {param} tidak hadir.',
    'string'                => 'Bidang harus berupa string yang valid.',
    'timezone'              => 'Bidang harus berupa sebuah zona waktu yang valid.',
    'valid_base64'          => 'Bidang harus berupa sebuah string base64 yang valid.',
    'valid_email'           => 'Bidang harus berisi sebuah alamat email yang valid.',
    'valid_emails'          => 'Bidang harus berisi semua alamat email yang valid.',
    'valid_ip'              => 'Bidang harus berisi sebuah IP yang valid.',
    'valid_url'             => 'Bidang harus berisi sebuah URL yang valid.',
    'valid_date'            => 'Bidang harus berisi sebuah tanggal yang valid.',

    // Credit Cards
    'valid_cc_num' => 'tidak tampak sebagai sebuah nomor kartu kredit yang valid.',

    // Files
    'uploaded' => 'bukan sebuah berkas diunggah yang valid.',
    'max_size' => 'terlalu besar dari sebuah berkas.',
    'is_image' => 'bukan berkas gambar diunggah yang valid.',
    'mime_in'  => 'tidak memiliki sebuah tipe mime yang valid.',
    'ext_in'   => 'tidak memiliki sebuah ekstensi berkas yang valid.',
    'max_dims' => 'bukan gambar, atau terlalu lebar atau tinggi.',
];
