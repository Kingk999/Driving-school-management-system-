<!DOCTYPE html>
<html>
<head>
    <title>New Category Created</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h1 style="font-size: 24px; color: #333333; margin-bottom: 20px;">A new category has been created!</h1>
        
        <p style="font-size: 18px; color: #555555; margin-bottom: 10px;">
        
        </p>
        
        <p style="font-size: 16px; color: #777777; margin-bottom: 20px;">
            You can now add products to this category.
        </p>
        
        <a href="{{ url('/categories') }}" style="display: inline-block; padding: 10px 20px; font-size: 16px; color: #ffffff; background-color: #007BFF; text-decoration: none; border-radius: 4px;">View Categories</a>
    </div>

</body>
</html>
