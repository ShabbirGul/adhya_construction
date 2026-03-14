@extends('layouts.admin')

@section('title', 'FAQs')

@section('breadcrumb')
<a href="{{ route('admin.dashboard') }}" style="color: #ffffff; text-decoration: none;">Admin</a> /
<span>FAQs</span>
@endsection

@section('content')
<div class="header" style="border:none; margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin:0; text-align: left; font-size: 1.5rem; color: var(--dark); font-weight: 700;">Frequently Asked Questions</h1>
    <button id="openSlider" class="btn">
        <i class="fa-solid fa-plus"></i> Add New FAQ
    </button>
</div>

<div class="table-card">
    <div class="table-header" style="padding: 1.5rem 2rem; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9;">
        <form action="{{ route('faqs.index') }}" method="GET" class="search-box" style="position: relative;">
            <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search FAQs..." style="width: 300px; transition: all 0.2s;">
        </form>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 1.25rem 2rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">S.No</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Question</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Answer</th>
                <th style="padding: 1.25rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Status</th>
                <th style="padding: 1.25rem 2rem; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($faqs as $faq)
            <tr>
                <td style="padding: 1rem 2rem;">{{ $loop->iteration + ($faqs->currentPage() - 1) * $faqs->perPage() }}</td>
                <td style="padding: 1rem; font-weight: 600; color: var(--dark);">{{ Str::limit($faq->question, 50) }}</td>
                <td style="padding: 1rem; color: #64748b; max-width: 300px;">{{ Str::limit($faq->answer, 60) }}</td>
                <td style="padding: 1rem;">
                    @if($faq->status)
                    <span style="background: #dcfce7; color: #166534; padding: 0.375rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600;">Active</span>
                    @else
                    <span style="background: #fee2e2; color: #991b1b; padding: 0.375rem 0.75rem; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600;">Inactive</span>
                    @endif
                </td>
                <td style="padding: 1rem 2rem; text-align: right;">
                    <div style="display: inline-flex; gap: 0.5rem;">
                        <button onclick="editFaq({{ $faq->id }})" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; border: 1px solid #e2e8f0; color: #64748b; background: #fff; cursor: pointer; transition: all 0.2s;" title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; border: 1px solid #fee2e2; color: #ef4444; background: #fff; cursor: pointer; transition: all 0.2s;" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 4rem; color: #64748b;">No FAQs found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table-footer" style="padding: 1.5rem 2rem;">
        {{ $faqs->links() }}
    </div>
</div>

<!-- Right Side Slider -->
<div class="slider-overlay" id="sliderOverlay"></div>
<div class="right-slider" id="rightSlider">
    <div class="slider-header">
        <h2 id="sliderTitle" style="margin:0; font-size: 1.25rem; font-weight: 700;">Add New FAQ</h2>
        <button class="close-slider" id="closeSlider">&times;</button>
    </div>
    <div class="slider-body">
        <form id="faqForm" action="{{ route('faqs.store') }}" method="POST">
            @csrf
            <div id="method_field"></div>
            <div class="form-group">
                <label style="color: #475569; font-weight: 600;">Question <span style="color: #ef4444;">*</span></label>
                <input type="text" name="question" id="faq_question" required style="width: 100%; background: #ffffff; color: #1e293b; border: 1px solid #cbd5e1; padding: 0.875rem; border-radius: 0.75rem;">
            </div>

            <div class="form-group" style="margin-top: 1.5rem;">
                <label style="color: #475569; font-weight: 600;">Answer <span style="color: #ef4444;">*</span></label>
                <textarea name="answer" id="faq_answer" rows="6" required style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; font-family: inherit; resize: vertical;"></textarea>
            </div>

            <div class="form-group" style="margin-top: 1.5rem;">
                <label style="color: #475569; font-weight: 600;">Status</label>
                <select name="status" id="faq_status" style="width: 100%; padding: 0.875rem; border: 1px solid #cbd5e1; border-radius: 0.75rem; background: #ffffff; cursor: pointer;">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </form>
    </div>
    <div class="slider-footer">
        <button type="submit" form="faqForm" class="btn-submit" style="flex: 1;">SAVE FAQ</button>
        <button type="button" id="cancelSlider" class="btn" style="background: #f1f5f9; color: #64748b !important; box-shadow: none;">CANCEL</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const slider = document.getElementById('rightSlider');
    const overlay = document.getElementById('sliderOverlay');
    const form = document.getElementById('faqForm');
    const sliderTitle = document.getElementById('sliderTitle');
    const methodField = document.getElementById('method_field');

    function showSlider(isEdit = false) {
        slider.classList.add('active');
        overlay.classList.add('active');
        sliderTitle.innerText = isEdit ? 'Edit FAQ' : 'Add New FAQ';
        if (!isEdit) {
            form.reset();
            form.action = "{{ route('faqs.store') }}";
            methodField.innerHTML = '';
        }
    }

    function hideSlider() {
        slider.classList.remove('active');
        overlay.classList.remove('active');
    }

    document.getElementById('openSlider').onclick = () => showSlider();
    document.getElementById('closeSlider').onclick = hideSlider;
    document.getElementById('cancelSlider').onclick = hideSlider;
    overlay.onclick = hideSlider;

    function editFaq(id) {
        fetch(`/admin/faqs/${id}/edit`)
            .then(res => res.json())
            .then(faq => {
                showSlider(true);
                form.action = `/admin/faqs/${id}`;
                methodField.innerHTML = '@method("PUT")';
                document.getElementById('faq_question').value = faq.question;
                document.getElementById('faq_answer').value = faq.answer;
                document.getElementById('faq_status').value = faq.status;
            });
    }
</script>
@endsection
