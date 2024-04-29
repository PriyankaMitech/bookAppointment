<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preparing Kundali</title>
</head>
<body>

<h2>Prepare Kundali</h2>

<form>
    <div>
        <label for="contact_person_name">Contact Person Name (संपर्क करणाऱ्या व्यक्तीचे नाव) *</label>
        <input type="text" id="contact_person_name" name="contact_person_name" required>
    </div>
    <div>
        <label for="contact_number">Contact Number (फोन नंबर) *</label>
        <input type="tel" id="contact_number" name="contact_number" required>
    </div>
    <div>
        <label for="email_address">Email Address (ई-मेल)</label>
        <input type="email" id="email_address" name="email_address">
    </div>
    <div>
        <label for="full_name">Full Name (पूर्ण नाव) *</label>
        <input type="text" id="full_name" name="full_name" required>
    </div>
    <div>
        <label for="name_in_devanagari">नाम देवनागरी में लिखिये (मराठीत नाव लिहा) *</label>
        <input type="text" id="name_in_devanagari" name="name_in_devanagari" required>
    </div>
    <div>
        <label for="gender">Gender (लिंग) *</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    <div>
        <label for="date_of_birth">Date of Birth (जन्मतारीख) *</label>
        <input type="date" id="date_of_birth" name="date_of_birth" required>
    </div>
    <div>
        <label for="time_of_birth">Time (जन्म वेळ) *</label>
        <input type="time" id="time_of_birth" name="time_of_birth" required>
    </div>
    <div>
        <label for="place_of_birth">Place of Birth (जन्म ठिकाण)</label>
        <input type="text" id="place_of_birth" name="place_of_birth">
    </div>
    <div>
        <label for="country">Country (देश) *</label>
        <input type="text" id="country" name="country" required>
    </div>
    <div>
        <label for="state">State (राज्य) *</label>
        <input type="text" id="state" name="state" required>
    </div>
    <div>
        <label for="city">City (शहर) *</label>
        <input type="text" id="city" name="city" required>
    </div>
    <div>
        <label for="fathers_full_name">Fathers Full Name (वडीलांचे पूर्ण नाव) *</label>
        <input type="text" id="fathers_full_name" name="fathers_full_name" required>
    </div>
    <div>
        <label for="mothers_name">Mother’s Name (आईचे नाव)</label>
        <input type="text" id="mothers_name" name="mothers_name">
    </div>
    <div>
        <label for="mothers_maiden_surname">Mother’s Maiden Surname (आईचे माहेरचे आडनाव )</label>
        <input type="text" id="mothers_maiden_surname" name="mothers_maiden_surname">
    </div>
    <div>
        <label for="religion">Religion (धर्म) *</label>
        <input type="text" id="religion" name="religion" required>
    </div>
    <div>
        <label for="caste">Caste (जात) *</label>
        <input type="text" id="caste" name="caste" required>
    </div>
    <div>
        <label for="sub_caste">Sub Caste (पोट जात)</label>
        <input type="text" id="sub_caste" name="sub_caste">
    </div>
    <div>
        <label for="gotra">Gotra (गोत्र)</label>
        <input type="text" id="gotra" name="gotra">
    </div>
    <div>
        <label for="address_on_kundali">Address on Kundali (कुंडलीवरील पत्ता) *</label>
        <input type="text" id="address_on_kundali" name="address_on_kundali" required>
    </div>
    <div>
        <label for="how_know_astrologer">How do you know about vedik astrologer? (वेदिक ॲस्ट्रॅालॅाजर बद्दल कुठून माहिती मिळाली?) *</label>
        <input type="text" id="how_know_astrologer" name="how_know_astrologer" required>
    </div>
    <div>
        <label for="friend_relative_name">Name of Friend/ Relative (मित्र/नातेवाईकाचे नाव)</label>
        <input type="text" id="friend_relative_name" name="friend_relative_name">
    </div>
    <div>
        <label for="kundali_language">Kundali language (कुंडली कोणत्या भाषेत बनवून हवी आहे) *</label>
        <input type="text" id="kundali_language" name="kundali_language" required>
    </div>
    <button type="submit">Submit</button>
</form>

</body>
</html>
