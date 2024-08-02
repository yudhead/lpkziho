@extends('layouts.app_ujian')

@section('title', 'Soal Ujian')

@section('content')
<div class="row">
    <div class="col-md-2">
        <div class="timer-box text-center">
            <h5>Waktu Anda</h5>
            <h2 id="timer">{{ $ujian->durasi_ujian }}:00</h2>
        </div>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Soal Ujian</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="ujianForm" action="{{ route('ujian.submit') }}" method="POST" onsubmit="return validateForm()">
                    @csrf
                    <input type="hidden" name="id_jenis_ujian" value="{{ $ujian->id_jenis_ujian }}">
                    @foreach($soalUjian as $index => $soal)
                    <div class="soal-container mb-3" id="soal-{{ $soal->id_soal_ujian }}">
                        <label style="font-size: 20px" class="d-block">{{ $index + 1 }}. {{ $soal->pertanyaan }}</label>
                        @foreach(['a', 'b', 'c', 'd'] as $option)
                        <div class="form-check custom-radio">
                            <input class="form-check-input" type="radio" name="jawaban[{{ $soal->id_soal_ujian }}]" value="{{ $option }}" id="jawaban{{ $soal->id_soal_ujian }}{{ $option }}">
                            <label class="form-check-label" for="jawaban{{ $soal->id_soal_ujian }}{{ $option }}" data-option="{{ strtoupper($option) }}">{{ $soal->$option }}</label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit Jawaban</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var timer = document.getElementById('timer');
    var totalTime = {{ $ujian->durasi_ujian }} * 60; // waktu ujian dalam detik
    var form = document.getElementById('ujianForm');
    var idPeserta = {{ $ujian->id_peserta }};
    var idJenisUjian = {{ $ujian->id_jenis_ujian }};
    var examKey = 'exam_' + idPeserta + '_' + idJenisUjian;

    // Function to get remaining time from localStorage
    function getRemainingTime() {
        var startTime = localStorage.getItem('startTime_' + idPeserta + '_' + idJenisUjian);
        if (startTime) {
            var elapsed = Math.floor((Date.now() - parseInt(startTime)) / 1000);
            return Math.max(totalTime - elapsed, 0);
        }
        return totalTime;
    }

    // Function to save start time to localStorage
    function saveStartTime() {
        if (!localStorage.getItem('startTime_' + idPeserta + '_' + idJenisUjian)) {
            localStorage.setItem('startTime_' + idPeserta + '_' + idJenisUjian, Date.now());
        }
    }

    // Initialize remaining time
    var remainingTime = getRemainingTime();

    function updateTimer() {
        var minutes = Math.floor(remainingTime / 60);
        var seconds = remainingTime % 60;
        timer.textContent = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
        if (remainingTime > 0) {
            remainingTime--;
        } else {
            clearInterval(interval);
            localStorage.removeItem('startTime_' + idPeserta + '_' + idJenisUjian); // Clear localStorage when time is up
            form.submit();
        }
    }

    var interval = setInterval(updateTimer, 1000);

    // Save start time if not already saved
    saveStartTime();

    // Function to save answers to localStorage
    function saveAnswers() {
        var answers = {};
        var inputs = document.querySelectorAll('.form-check-input');
        inputs.forEach(function(input) {
            if (input.checked) {
                answers[input.name] = input.value;
            }
        });
        localStorage.setItem(examKey, JSON.stringify(answers));
    }

    // Function to load answers from localStorage
    function loadAnswers() {
        var savedAnswers = JSON.parse(localStorage.getItem(examKey) || '{}');
        for (var key in savedAnswers) {
            if (savedAnswers.hasOwnProperty(key)) {
                var input = document.querySelector('input[name="' + key + '"][value="' + savedAnswers[key] + '"]');
                if (input) {
                    input.checked = true;
                }
            }
        }
    }

    // Load answers when page loads
    window.addEventListener('load', loadAnswers);

    // Save answers when any input changes
    document.querySelectorAll('.form-check-input').forEach(function(input) {
        input.addEventListener('change', saveAnswers);
    });

    // Clear localStorage on form submit
    form.addEventListener('submit', function() {
        localStorage.removeItem('startTime_' + idPeserta + '_' + idJenisUjian);
        localStorage.removeItem(examKey);
    });

    // Function to validate form
    function validateForm() {
        var isValid = true;
        var unanswered = [];

        document.querySelectorAll('.soal-container').forEach(function(container) {
            var inputs = container.querySelectorAll('.form-check-input');
            var answered = false;

            inputs.forEach(function(input) {
                if (input.checked) {
                    answered = true;
                }
            });

            if (!answered) {
                isValid = false;
                unanswered.push(container);
            }
        });

        if (!isValid) {
            var firstUnanswered = unanswered[0];
            firstUnanswered.scrollIntoView({ behavior: 'smooth', block: 'center' });
            alert('Harap jawab semua soal sebelum mengirimkan.');
        }

        return isValid;
    }
</script>
@endsection
