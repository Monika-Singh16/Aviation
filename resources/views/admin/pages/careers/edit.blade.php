@extends('admin.layout.master')
@section('title', 'Edit Career')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Career</h1>

<form action="{{ route('careers.update', $career->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    <!-- Job Title -->
    <div>
        <label class="block font-semibold mb-1">Job Title</label>
        <input type="text" name="job_title" value="{{ $career->job_title }}" placeholder="Enter job title" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Job Description -->
    <div>
        <label class="block font-semibold mb-1">Job Description</label>
        <textarea name="job_description" rows="4" placeholder="Enter job description" class="w-full border px-3 py-2 rounded" required>{{ $career->job_description }}</textarea>
    </div>

    <!-- Key Responsibilities -->
    <div>
        <label class="block font-semibold mb-1">Key Responsibilities</label>
        <div id="keyResponsibilitiesContainer">
            @foreach($career->key_responsibilities as $index => $item)
                <div class="flex items-center gap-2 mb-2">
                    <textarea name="key_responsibilities[{{ $index }}]" class="border px-3 py-2 rounded flex-1" required>{{ $item }}</textarea>

                    <button type="button" onclick="addKeyResponsibilityField()" class="bg-green-500 text-white px-3 py-2 rounded">
                        <i class="fas fa-plus"></i>
                    </button>

                    <button type="button" onclick="removeKeyResponsibilityField(this)" class="bg-red-500 text-white px-3 py-2 rounded">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Key Process -->
    <div>
        <label class="block font-semibold mb-1">Key Process</label>
        <div id="keyProcessContainer">
           @foreach($career->key_process as $index => $item)
                <div class="flex items-center gap-2 mb-2">
                    <textarea name="key_process[{{ $index }}]" class="border px-3 py-2 rounded flex-1" required>{{ $item }}</textarea>

                    <button type="button" onclick="addKeyProcessField()" class="bg-green-500 text-white px-3 py-2 rounded">
                        <i class="fas fa-plus"></i>
                    </button>

                    <button type="button" onclick="removeKeyProcessField(this)" class="bg-red-500 text-white px-3 py-2 rounded">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Skills Qualification -->
    <div>
        <label class="block font-semibold mb-1">Skills Qualification</label>
        <div id="skillsQualificationContainer">
            @foreach($career->skills_qualification as $index => $item)
                <div class="flex items-center gap-2 mb-2">
                    <textarea name="skills_qualification[{{ $index }}]" class="border px-3 py-2 rounded flex-1" required>{{ $item }}</textarea>

                    <button type="button" onclick="addSkillsQualificationField()" class="bg-green-500 text-white px-3 py-2 rounded">
                        <i class="fas fa-plus"></i>
                    </button>

                    <button type="button" onclick="removeSkillsQualificationField(this)" class="bg-red-500 text-white px-3 py-2 rounded">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Work Experience -->
    <div>
        <label class="block font-semibold mb-1">Work Experience</label>
        <div id="workExperienceContainer">
            @foreach($career->work_experience as $index => $item)
                <div class="flex items-center gap-2 mb-2">
                    <textarea name="work_experience[{{ $index }}]" class="border px-3 py-2 rounded flex-1" required>{{ $item }}</textarea>

                    <button type="button" onclick="addWorkExperienceField()" class="bg-green-500 text-white px-3 py-2 rounded">
                        <i class="fas fa-plus"></i>
                    </button>

                    <button type="button" onclick="removeWorkExperienceField(this)" class="bg-red-500 text-white px-3 py-2 rounded">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Benefits -->
    <div>
        <label class="block font-semibold mb-1">Benefits</label>
        <div id="benefitsContainer">
            @foreach($career->benefits as $index => $item)
                <div class="flex items-center gap-2 mb-2">
                    <textarea name="benefits[{{ $index }}]" class="border px-3 py-2 rounded flex-1" required>{{ $item }}</textarea>

                    <button type="button" onclick="addBenefitsField()" class="bg-green-500 text-white px-3 py-2 rounded">
                        <i class="fas fa-plus"></i>
                    </button>

                    <button type="button" onclick="removeBenefitsField(this)" class="bg-red-500 text-white px-3 py-2 rounded">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Date Opened -->
    <div>
        <label class="block font-semibold mb-1">Date Opened</label>
        <input type="date" name="date_opened" value="{{ $career->date_opened }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Job Type -->
    <div>
        <label class="block font-semibold mb-1">Job Type</label>
        <input type="text" name="job_type" value="{{ $career->job_type }}" placeholder="Enter job type" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Industry -->
    <div>
        <label class="block font-semibold mb-1">Industry</label>
        <input type="text" name="industry" value="{{ $career->industry }}" placeholder="Enter industry" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Salary -->
    <div>
        <label class="block font-semibold mb-1">Salary</label>
        <input type="text" name="salary" value="{{ $career->salary }}" placeholder="Enter salary" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- City -->
    <div>
        <label class="block font-semibold mb-1">City</label>
        <input type="text" name="city" value="{{ $career->city }}" placeholder="Enter city" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- State/Province -->
    <div>
        <label class="block font-semibold mb-1">State/Province</label>
        <input type="text" name="state_province" value="{{ $career->state_province }}" placeholder="Enter state/province" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Country -->
    <div>
        <label class="block font-semibold mb-1">Country</label>
        <input type="text" name="country" value="{{ $career->country }}" placeholder="Enter country" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Zip/Postal Code -->
    <div>
        <label class="block font-semibold mb-1">Zip/Postal Code</label>
        <input type="text" name="zip_postal_code" value="{{ $career->zip_postal_code }}" placeholder="Enter zip/postal code" class="w-full border px-3 py-2 rounded" required>
    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Update</button>
</form>

<script>
    let keyResponsibilitiesIndex = {{ count($career->key_responsibilities) }};
    let keyProcessIndex = {{ count($career->key_process) }};
    let skillsQualificationIndex = {{ count($career->skills_qualification) }};
    let workExperienceIndex = {{ count($career->work_experience) }};
    let benefitsIndex = {{ count($career->benefits) }};

    function addKeyResponsibilityField() {
        const container = document.getElementById('keyResponsibilitiesContainer');
        const newField = document.createElement('div');
        newField.className = 'flex items-center gap-2 mb-2';
        newField.innerHTML = `
            <button type="button" onclick="addKeyResponsibilityField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                <i class="fas fa-plus"></i>
            </button>
            <textarea name="key_responsibilities[${keyResponsibilitiesIndex}]" placeholder="Responsibility" rows="2" class="border px-3 py-2 rounded flex-1" required></textarea>
            <button type="button" onclick="removeKeyResponsibilityField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;
        container.appendChild(newField);
        keyResponsibilitiesIndex++;
    }

    function removeKeyResponsibilityField(button) {
        const container = document.getElementById('keyResponsibilitiesContainer');
        if (container.children.length > 1) {
            button.parentElement.remove();
        }
    }

    function addKeyProcessField() {
        const container = document.getElementById('keyProcessContainer');
        const newField = document.createElement('div');
        newField.className = 'flex items-center gap-2 mb-2';
        newField.innerHTML = `
            <button type="button" onclick="addKeyProcessField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                <i class="fas fa-plus"></i>
            </button>
            <input type="text" name="key_process[${keyProcessIndex}][key]" placeholder="Key" class="border px-3 py-2 rounded flex-1" required>
            <input type="text" name="key_process[${keyProcessIndex}][value]" placeholder="Value" class="border px-3 py-2 rounded flex-1" required>
            <button type="button" onclick="removeKeyProcessField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;
        container.appendChild(newField);
        keyProcessIndex++;
    }

    function removeKeyProcessField(button) {
        const container = document.getElementById('keyProcessContainer');
        if (container.children.length > 1) {
            button.parentElement.remove();
        }
    }

    function addSkillsQualificationField() {
        const container = document.getElementById('skillsQualificationContainer');
        const newField = document.createElement('div');
        newField.className = 'flex items-center gap-2 mb-2';
        newField.innerHTML = `
            <button type="button" onclick="addSkillsQualificationField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                <i class="fas fa-plus"></i>
            </button>
            <input type="text" name="skills_qualification[${skillsQualificationIndex}][key]" placeholder="Key" class="border px-3 py-2 rounded flex-1" required>
            <input type="text" name="skills_qualification[${skillsQualificationIndex}][value]" placeholder="Value" class="border px-3 py-2 rounded flex-1" required>
            <button type="button" onclick="removeSkillsQualificationField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;
        container.appendChild(newField);
        skillsQualificationIndex++;
    }

    function removeSkillsQualificationField(button) {
        const container = document.getElementById('skillsQualificationContainer');
        if (container.children.length > 1) {
            button.parentElement.remove();
        }
    }

    function addWorkExperienceField() {
        const container = document.getElementById('workExperienceContainer');
        const newField = document.createElement('div');
        newField.className = 'flex items-center gap-2 mb-2';
        newField.innerHTML = `
            <button type="button" onclick="addWorkExperienceField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                <i class="fas fa-plus"></i>
            </button>
            <input type="text" name="work_experience[${workExperienceIndex}][key]" placeholder="Key" class="border px-3 py-2 rounded flex-1" required>
            <input type="text" name="work_experience[${workExperienceIndex}][value]" placeholder="Value" class="border px-3 py-2 rounded flex-1" required>
            <button type="button" onclick="removeWorkExperienceField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;
        container.appendChild(newField);
        workExperienceIndex++;
    }

    function removeWorkExperienceField(button) {
        const container = document.getElementById('workExperienceContainer');
        if (container.children.length > 1) {
            button.parentElement.remove();
        }
    }

    function addBenefitsField() {
        const container = document.getElementById('benefitsContainer');
        const newField = document.createElement('div');
        newField.className = 'flex items-center gap-2 mb-2';
        newField.innerHTML = `
            <button type="button" onclick="addBenefitsField()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                <i class="fas fa-plus"></i>
            </button>
            <input type="text" name="benefits[${benefitsIndex}][key]" placeholder="Key" class="border px-3 py-2 rounded flex-1" required>
            <input type="text" name="benefits[${benefitsIndex}][value]" placeholder="Value" class="border px-3 py-2 rounded flex-1" required>
            <button type="button" onclick="removeBenefitsField(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-minus"></i>
            </button>
        `;
        container.appendChild(newField);
        benefitsIndex++;
    }

    function removeBenefitsField(button) {
        const container = document.getElementById('benefitsContainer');
        if (container.children.length > 1) {
            button.parentElement.remove();
        }
    }
</script>
@endsection
