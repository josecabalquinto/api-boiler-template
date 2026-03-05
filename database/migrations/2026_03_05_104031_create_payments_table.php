<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('fee_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('community_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('type', ['monthly_due', 'annual_due', 'special_assessment', 'fine', 'other'])
                ->default('monthly_due');
            $table->decimal('amount', 10, 2);
            $table->enum('frequency', ['one_time', 'monthly', 'quarterly', 'annual'])->default('monthly');
            $table->date('due_day')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('community_id')->constrained()->cascadeOnDelete();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('fee_schedule_id')->nullable()->constrained()->nullOnDelete();
            $table->string('reference_number')->unique();
            $table->string('description');
            $table->decimal('amount_due', 10, 2);
            $table->decimal('amount_paid', 10, 2)->default(0);
            $table->decimal('penalty', 10, 2)->default(0);
            $table->enum('status', ['pending', 'partial', 'paid', 'overdue', 'waived'])->default('pending');
            $table->enum('payment_method', [
                'cash',
                'check',
                'bank_transfer',
                'gcash',
                'maya',
                'credit_card',
                'other'
            ])->nullable();
            $table->date('due_date');
            $table->timestamp('paid_at')->nullable();
            $table->foreignId('recorded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('notes')->nullable();
            $table->string('receipt_path')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['community_id', 'status', 'due_date']);
            $table->index(['property_id', 'status']);
        });

        Schema::create('billing_periods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('community_id')->constrained()->cascadeOnDelete();
            $table->string('label');
            $table->date('period_start');
            $table->date('period_end');
            $table->date('due_date');
            $table->boolean('is_closed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_schedules');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('billing_periods');
    }
};
